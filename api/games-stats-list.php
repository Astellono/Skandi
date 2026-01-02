<?php
/**
 * Публичный список Excel-файлов статистики игр
 * Источник: /data/stats/krug1/ или /data/stats/krug2/
 */

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

// Получаем параметр круга (по умолчанию krug1)
$krug = $_GET['krug'] ?? 'krug1';
if (!in_array($krug, ['krug1', 'krug2'])) {
    $krug = 'krug1';
}

$statsDir = __DIR__ . '/../data/stats/' . $krug . '/';
$baseUrlPrefix = '/data/stats/' . $krug . '/';

$allowedExts = ['xlsx', 'xls', 'xlsm'];

if (!is_dir($statsDir)) {
    echo json_encode(['success' => true, 'files' => [], 'krug' => $krug]);
    exit;
}

$files = [];

// Получаем названия игр из базы данных
require_once __DIR__ . '/db.php';
$gamesMap = [];
$stmt = $conn->prepare("SELECT excel_file, game_name, opponent_team FROM games WHERE is_active = 1 AND krug = ?");
$stmt->bind_param("s", $krug);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    if (!empty($row['excel_file'])) {
        // Конвертируем имя файла из БД в UTF-8 для правильного сопоставления
        $dbFileName = mb_convert_encoding($row['excel_file'], 'UTF-8', mb_detect_encoding($row['excel_file'], 'UTF-8, Windows-1251, ISO-8859-1', true));
        $gamesMap[$dbFileName] = [
            'game_name' => $row['game_name'],
            'opponent_team' => $row['opponent_team']
        ];
        // Также добавляем оригинальное имя на случай, если кодировка отличается
        if ($dbFileName !== $row['excel_file']) {
            $gamesMap[$row['excel_file']] = [
                'game_name' => $row['game_name'],
                'opponent_team' => $row['opponent_team']
            ];
        }
    }
}
$stmt->close();

$dirIterator = new DirectoryIterator($statsDir);
foreach ($dirIterator as $fileinfo) {
    if ($fileinfo->isDot() || !$fileinfo->isFile()) {
        continue;
    }
    $ext = strtolower($fileinfo->getExtension());
    if (!in_array($ext, $allowedExts, true)) {
        continue;
    }
    $filename = $fileinfo->getFilename();
    // Конвертируем имя файла в UTF-8 для правильного отображения русских символов
    $filename = mb_convert_encoding($filename, 'UTF-8', mb_detect_encoding($filename, 'UTF-8, Windows-1251, ISO-8859-1', true));
    $key = pathinfo($filename, PATHINFO_FILENAME); // имя файла без расширения
    // Кодируем имя файла для URL, но сохраняем оригинальное для отображения
    $encodedFilename = rawurlencode($filename);
    
    // Получаем название игры из базы данных, если есть соответствие
    $gameName = null;
    $opponentTeam = null;
    
    // Прямое совпадение
    if (isset($gamesMap[$filename])) {
        $gameName = $gamesMap[$filename]['game_name'];
        $opponentTeam = $gamesMap[$filename]['opponent_team'];
    } else {
        // Пытаемся найти по части имени (без расширения)
        $filenameWithoutExt = pathinfo($filename, PATHINFO_FILENAME);
        foreach ($gamesMap as $dbFile => $gameData) {
            $dbFileWithoutExt = pathinfo($dbFile, PATHINFO_FILENAME);
            // Сравниваем без учета регистра и пробелов
            if (mb_strtolower(str_replace([' ', '_', '-'], '', $filenameWithoutExt)) === 
                mb_strtolower(str_replace([' ', '_', '-'], '', $dbFileWithoutExt))) {
                $gameName = $gameData['game_name'];
                $opponentTeam = $gameData['opponent_team'];
                break;
            }
        }
    }
    
    $files[] = [
        'file' => $filename,
        'key' => $key,
        'path' => $baseUrlPrefix . $encodedFilename,
        'game_name' => $gameName,
        'opponent_team' => $opponentTeam,
    ];
}

// Убеждаемся, что JSON правильно кодируется с UTF-8
echo json_encode([
    'success' => true,
    'files' => $files,
    'krug' => $krug,
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>


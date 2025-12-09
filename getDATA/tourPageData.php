<?php
/**
 * Возвращает данные тура для страницы, используя ссылку из таблицы tours.
 * $defaults позволяет задать значения по умолчанию на случай отсутствия записи в БД.
 */
if (!function_exists('getTourPageData')) {
    function getTourPageData($connect, string $relativePagePath, array $defaults = []): array
    {
        $data = array_merge([
            'name' => null,
            'date' => null,
            'price' => null,
        ], $defaults);

        if (!($connect instanceof mysqli)) {
            return $data;
        }

        $stmt = $connect->prepare('SELECT tour_name, tour_date, tour_price FROM tours WHERE tour_linkPage = ? LIMIT 1');
        if (!$stmt) {
            return $data;
        }

        $stmt->bind_param('s', $relativePagePath);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result && ($row = $result->fetch_assoc())) {
                $data['name'] = $row['tour_name'] ?: $data['name'];
                $data['date'] = $row['tour_date'] ?: $data['date'];
                $data['price'] = $row['tour_price'] ?: $data['price'];
            }
        }

        $stmt->close();
        return $data;
    }
}


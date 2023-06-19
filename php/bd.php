<?php
if (isset($_POST['name']) && isset($_POST['text'])){
    $login = $_POST['login'];
    $pass = $_POST['pass'];

    // Параметры для подключения
    $db_host = "127.0.0.1"; 
    $db_user = "astellono_bd"; // Логин БД
    $db_password = "123137"; // Пароль БД
    $db_base = 'astellono_bd'; // Имя БД
    $db_table = "clients"; // Имя Таблицы БД

    try {
        // Подключение к базе данных
        $db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);
        // Устанавливаем корректную кодировку
        $db->exec("set names utf8");
        // Собираем данные для запроса
        $data = array( 'login' => $login, 'pass' => $pass ); 
        // Подготавливаем SQL-запрос
        $query = $db->prepare("INSERT INTO $db_table (`id`, `email`, `pass`) VALUES (NULL, :login, :pass)");
        // Выполняем запрос с данными
        $query->execute($data);
        // Запишим в переменую, что запрос отрабтал
        $result = true;
    } catch (PDOException $e) {
        // Если есть ошибка соединения или выполнения запроса, выводим её
        print "Ошибка!: " . $e->getMessage() . "<br/>";
    }

    if ($result) {
        echo "Успех. Информация занесена в базу данных";
    }
}
?>
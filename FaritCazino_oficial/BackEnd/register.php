

<?php
    // Настройки подключения к базе данных
    $servername = "localhost";
    $username = "Username"; // замените на имя пользователя вашей базы данных
    $password = "PasswordHash"; // замените на пароль вашей базы данных
    $dbname = "CasinoEmulator";

    // Создаем подключение
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Проверяем подключение
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Проверяем, были ли отправлены данные через POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Получаем данные из формы
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Хешируем пароль перед сохранением в базу данных
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Формируем SQL-запрос для вставки данных
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $hashed_password);

        // Выполняем запрос
        if ($stmt->execute()) {
            echo "Регистрация прошла успешно!";
        } else {
            echo "Ошибка: " . $stmt->error;
        }

        // Закрываем подготовленный запрос
        $stmt->close();
    }

    // Закрываем соединение с базой данных
    $conn->close();
?>


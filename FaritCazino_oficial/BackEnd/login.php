<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost', 'username', 'password', 'CasinoEmulator');

    if ($conn->connect_error) {
        die("Ошибка подключения: " . $conn->connect_error);
    }

    // Подготовленный запрос для предотвращения SQL-инъекций
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($hash);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        // Проверка пароля
        if (password_verify($password, $hash)) {
            // Успешный вход
            echo "Добро пожаловать, " . htmlspecialchars($username);
            // Здесь можно установить сессию для пользователя
        } else {
            echo "Неверный пароль";
        }
    } else {
        echo "Пользователь не найден";
    }

    $stmt->close();
    $conn->close();
}
?>
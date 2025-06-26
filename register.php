<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    // Подключение к базе данных
    $conn = new mysqli('localhost', 'db_user', 'db_password', 'db_name');
    if ($conn->connect_error) {
        die("Ошибка подключения: " . $conn->connect_error);}
    // Вставка пользователя в базу данных
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
?>


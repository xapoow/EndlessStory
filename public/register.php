<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Возвращаем назад...</h1>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'config.php';
    
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        die("Ошибка: все поля обязательны для заполнения.");
    }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, password_hash) VALUES (?, ?)");
        $stmt->execute([$username, $passwordHash]);
        echo "<script>alert('Регистрация успешна!'); setTimeout(function(){ window.location.href = 'index.html'; }, 2000);</script>";
        exit();
    } catch (PDOException $e) {
        die("Ошибка регистрации: " . $e->getMessage());
    }
}
?>
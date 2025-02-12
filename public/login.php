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
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'config.php';
    
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        die("Ошибка: все поля обязательны для заполнения.");
    }

    $stmt = $pdo->prepare("SELECT id, password_hash FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $username;
        $_SESSION['logged_in'] = true;
        echo "<script>alert('Вход выполнен!'); setTimeout(function(){ window.location.href = 'index.html'; }, 2000);</script>";
        exit();
    } else {
        echo "Ошибка: неверное имя пользователя или пароль.";
    }
}
?>
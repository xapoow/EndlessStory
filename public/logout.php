<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Деавторизация</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Возвращаем назад...</h1>
</body>
</html>

<?php
session_start();
session_destroy();
echo "<script>alert('Вы вышли из аккаунта.'); setTimeout(function(){ window.location.href = 'index.html'; }, 2000);</script>";
exit();
?>
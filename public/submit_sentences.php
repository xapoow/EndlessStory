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
require 'config.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Ошибка: недопустимый метод запроса.");
}
if (!isset($_SESSION['user_id'])) {
    die("Ошибка: пользователь не авторизован.");
}

$user_id = $_SESSION['user_id'];
$sentence = trim($_POST['sentence'] ?? '');

$max_length = 200; // Максимальное количество символов в предложении
if (empty($sentence)) {
    die("Ошибка: предложение не может быть пустым.");
}
if (mb_strlen($sentence, 'UTF-8') > $max_length) {
    die("Ошибка: предложение не может превышать $max_length символов.");
}

$stmt = $pdo->prepare("SELECT last_submission_time FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$last_submission_time = $stmt->fetchColumn();

if ($last_submission_time) {
    $last_time = strtotime($last_submission_time);
    $current_time = time();
    if (($current_time - $last_time) < 86400) {
        die("Ошибка: вы можете добавить новое предложение только раз в 24 часа.");
    }
}

$stmt = $pdo->prepare("INSERT INTO sentences (user_id, text) VALUES (?, ?)");
$stmt->execute([$user_id, htmlspecialchars($sentence, ENT_QUOTES, 'UTF-8')]);

$stmt = $pdo->prepare("UPDATE users SET last_submission_time = NOW() WHERE id = ?");
$stmt->execute([$user_id]);

echo "<script>alert('Предложение добавлено!'); setTimeout(function(){ window.location.href = 'index.html'; }, 2000);</script>";
exit();
?>
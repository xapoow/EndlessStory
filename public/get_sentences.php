<?php
require 'config.php';
$stmt = $pdo->query("SELECT text FROM sentences ORDER BY id ASC");
$sentences = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($sentences);
?>
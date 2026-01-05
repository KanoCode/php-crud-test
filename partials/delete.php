<?php
require_once 'connect.php';

if (!isset($_GET['id'])) {
    header("Location: /");
    exit;
}

$id = $_GET['id'];

$sql = "DELETE FROM users WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':id' => $id
]);

header("Location: /");
exit;

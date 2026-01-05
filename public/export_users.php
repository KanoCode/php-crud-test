<?php
declare(strict_types=1);

require_once __DIR__ . '/../partials/connect.php';

// filename
$filename = 'users_' . date('Y-m-d_H-i-s') . '.csv';

// save file on server
$exportDir = __DIR__ . '/../storage/exports';
if (!is_dir($exportDir)) {
    mkdir($exportDir, 0777, true);
}

$filePath = $exportDir . '/' . $filename;
$file = fopen($filePath, 'w');

// CSV headers
fputcsv($file, ['id', 'name', 'email', 'phone_number'], ',', '"', '\\');

// fetch data
$stmt = $pdo->query("SELECT id, name, email, phone_number FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// write rows
foreach ($users as $user) {
    fputcsv($file, $user, ',', '"', '\\');
}

fclose($file);

// force download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Content-Length: ' . filesize($filePath));

readfile($filePath);
exit;

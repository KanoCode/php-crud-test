<?php


declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '1');

if (!isset($_FILES['csv_file'])) {
    die('No file uploaded');
}

$file = $_FILES['csv_file'];

// validate upload
if ($file['error'] !== UPLOAD_ERR_OK) {
    die('Upload failed');
}

// validate extension
$ext = pathinfo($file['name'], PATHINFO_EXTENSION);
if ($ext !== 'csv') {
    die('Only CSV files allowed');
}

// save location
$uploadDir = __DIR__ . '/../storage/uploads';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$filename = 'users_' . date('Y-m-d_H-i-s') . '.csv';
$destination = $uploadDir . '/' . $filename;

// move file
if (!move_uploaded_file($file['tmp_name'], $destination)) {
    die('Failed to save file');
}



require_once __DIR__ . '/../partials/connect.php';

$handle = fopen($destination, 'r');

// skip header
fgetcsv($handle, 0, ',', '"', '\\');

$stmt = $pdo->prepare(
    "INSERT INTO users (name, email, phone_number)
     VALUES (:name, :email, :phone)
     ON DUPLICATE KEY UPDATE
        name = VALUES(name),
        phone_number = VALUES(phone_number)"
);

while (($row = fgetcsv($handle, 0, ',', '"', '\\')) !== false) {

    if (count($row) < 4) {
        continue;
    }

    $stmt->execute([
        ':name'  => trim($row[1]),
        ':email' => trim($row[2]),
        ':phone' => trim($row[3]),
    ]);
}

fclose($handle);

// success
header('Location: /php-crud-test?upload=success');
exit;

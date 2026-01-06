<?php
declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once __DIR__ . '/../partials/connect.php';

/**
 * Redirect helper
 */
function redirect(string $status): void {
    header("Location: /php-crud-test?upload={$status}");
    exit;
}

/**
 * 1. Validate upload
 */
if (!isset($_FILES['csv_file'])) {
    redirect('failed');
}

$file = $_FILES['csv_file'];

if ($file['error'] !== UPLOAD_ERR_OK) {
    redirect('failed');
}

/**
 * 2. Validate extension
 */
$ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
if ($ext !== 'csv') {
    redirect('failed');
}

/**
 * 3. Save file (always)
 */
$uploadDir = __DIR__ . '/../storage/uploads';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$filename = 'users_' . date('Y-m-d_H-i-s') . '.csv';
$destination = $uploadDir . '/' . $filename;

if (!move_uploaded_file($file['tmp_name'], $destination)) {
    redirect('failed');
}

/**
 * 4. Open CSV
 */
$handle = fopen($destination, 'r');
if (!$handle) {
    redirect('saved_not_imported');
}

/**
 * 5. Read header
 */
$header = fgetcsv($handle);
if (!$header || count($header) < 4) {
    fclose($handle);
    redirect('saved_not_imported');
}

/**
 * 6. Prepare statement
 */
$stmt = $pdo->prepare(
    "INSERT INTO users (name, email, phone_number)
     VALUES (:name, :email, :phone_number)
     ON DUPLICATE KEY UPDATE
        name = VALUES(name),
        phone_number = VALUES(phone_number)"
);

$imported = 0;
$skipped  = 0;

/**
 * 7. Process rows safely
 */
while (($row = fgetcsv($handle)) !== false) {

    // Must have required columns
    if (count($row) < 4) {
        $skipped++;
        continue;
    }

    $name  = trim($row[1] ?? '');
    $email = trim($row[2] ?? '');
    $phone = trim($row[3] ?? '');

    // Basic validation
    if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $skipped++;
        continue;
    }

    // Prevent "Data too long" errors
    $phone = substr($phone, 0, 20);

    try {
        $stmt->execute([
            ':name'  => $name,
            ':email' => $email,
            ':phone_number' => $phone,
        ]);
        $imported++;
    } catch (PDOException $e) {
        // Ignore bad rows, continue processing
        $skipped++;
        continue;
    }
}

fclose($handle);

/**
 * 8. Redirect result
 */
if ($imported > 0) {
    redirect('success');
}

redirect('saved_not_imported');

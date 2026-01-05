<?php

require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: form.php");
    exit;
}



$name = trim($_POST["username"]);
$email = trim($_POST["email"]);
$phone_number = trim($_POST["phone_number"]);

if ($name === "" || $email === "" || $phone_number === "") {
    die("All fields are required");
}

$sql = "INSERT INTO users (name,email, phone_number) VALUES (:name, :email, :phone_number)";

$stmt = $pdo->prepare($sql);


$stmt->execute([":name" => $name, ":email" => $email, ":phone_number" => $phone_number]);

header("Location: /php-crud-test");

exit;

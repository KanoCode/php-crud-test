<?php
// class Database
// {
//     private $dbserver = "localhost";
//     private $dbuser = "root";
//     private $dbpassword = "kano1996";
//     private $dbname = "userdata";
//     public $conn;

//     //  constructor

//     public function __construct()
//     {

//         try {

//             $dsn = "mysql:host={$this->dbserver}; dbname={$this->dbname}; charset=utf8";
//             $options = array(PDO::ATTR_PERSISTENT);
//             $this->conn = new PDO($dsn, $this->dbuser, $this->dbpassword, $options);
//         } catch (PDOException $e) {
//             echo "Connection Error" . $e->getMessage();
//         }
//     }

//     /**
//      * Get the database connection
//      * @return PDO|null
//      * 
//      */

//     public function getConnection()
//     {
//         return $this->conn;
//     }

//     // close the connection when the object is destroyed
//     public function __destruct()
//     {

//         $this->conn = null;
//     }
// }


$host = "localhost";
$dbname = "userdata";
$dbuser = "phpuser";
$dbpassword = "php_password";
$charset = "utf8mb4";


// $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// $options = [
//   PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//   PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
// ];

// try {
//   $pdo = new PDO($dsn, $user, $pass, $options);
// } catch (PDOException $e) {
//   die("Connection failed: " . $e->getMessage());
// }

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

$options = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
  $pdo = new PDO($dsn, $dbuser, $dbpassword, $options);
} catch (PDOException $e) {
  die("Connection failed:" . $e->getMessage());
}

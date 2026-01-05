<?php
require_once 'connect.php';


require_once 'connect.php';

$id = $name = $email = $phone_number = "";
$errorMessage = "";
$successMessage = "";

/* ======================
   GET: Load user
====================== */
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (empty($_GET['id'])) {
        header("Location: /php-crud-test");
        exit;
    }

    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        header("Location: /php-crud-test");
        exit;
    }

    $name = $user['name'];
    $email = $user['email'];
    $phone_number = $user['phone_number'];
}

/* ======================
   POST: Update user
====================== */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'] ?? '';
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone_number = trim($_POST['phone_number'] ?? '');

    if (empty($id) || empty($name) || empty($email) || empty($phone_number)) {
        $errorMessage = "All fields are required";
    } else {
        $sql = "UPDATE users
                SET name = :name,
                    email = :email,
                    phone_number = :phone
                WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':name'  => $name,
            ':email' => $email,
            ':phone' => $phone_number,
            ':id'    => $id
        ]);

        $successMessage = "User updated successfully";
        header("Location: /php-crud-test");
        exit;
    }
}


// $id = "";
// $name = "";
// $email = "";
// $phone = "";


// if ($_SERVER['REQUEST_METHOD'] == 'GET') {
//     // GET
//     if (!isset($_GET['id'])) {
//         header("location: /");
//         exit;
//     }
//     // 1. Prepare & execute

//     $id = $_GET["id"];
//     $sql = "SELECT * FROM users WHERE id=$id";
//     $stmt = $pdo->prepare($sql);
//     $stmt->execute();

//     // $row =
//     $row = $stmt->fetch(PDO::FETCH_ASSOC);
//     if (!$row) {
//         header('location: /');
//         exit;
//     }
//     $id = $row['id'];
//     $name = $row['name'];
//     $email = $row["email"];
//     $phone_number = $row["phone_number"];
// } else {
//     // receiving data via post method
//     $id = $_POST['id'];
//     $name = $_POST['name'];
//     $email = $_POST["email"];
//     $phone_number = $_POST["phone_number"];

//     do {
// if(empty($id)||empty($name)||empty($email)||empty($phone_number)){
//     $errorMessage = "All the fields are required";
//     break;
// }
// $sql = "UPDATE users ". "SET name ='$name', email='$email', phone_number='$phone_number'"."WHERE id = '$id'
// "; 

// $stmt = $pdo->prepare($sql);
//     $stmt->execute();

//     if(!$stmt){
//         $errorMessage = "Invalid query: ";
//         break;
//     }

//     $successMessage = "user updated successfully";
// }while (false);
// }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Project</title>
    <!-- bootstrap css link -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <h1 class="bg-dark text-light text-center py-2"> Update Users</h1>


    <div class="container">



        <form method="post">
            <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input value="<?= htmlspecialchars($name) ?>" type="text" name="name" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input value="<?= htmlspecialchars($email) ?>" type="email" name="email" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone Number</label>
                <div class="col-sm-6">
                    <input value="<?= htmlspecialchars($phone_number) ?>" type="text" name="phone_number" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-dark">Edit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a href="/" class="btn btn-outline-dark">Back</a>
                </div>
            </div>
        </form>

    </div>

    <!-- jquery -->

    <!-- bootstrap js and popper -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>

</body>

</html>
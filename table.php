<?php
require_once './partials/connect.php';

// 1. Prepare & execute
$sql = "SELECT * FROM users";
$stmt = $pdo->prepare($sql);
$stmt->execute();

// 2. Fetch all results
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<table class="table" id="usertable">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Operations</th>
        </tr>
    </thead>

    <tbody>
        <?php if (empty($results)): ?>
            <tr>
                <td colspan="5">No records found</td>
            </tr>
        <?php else: ?>
            <?php foreach ($results as $row): ?>
                <tr>
                    <th><?= $row['id'] ?></th>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['phone_number'] ?? '') ?></td>
                    <td>
                        <a href='/php-crud-test/partials/edituser.php?id=<?= $row['id'] ?>' class="text-success mr-3"><i class="fa-solid fa-pencil"></i></a>
                        <!-- <a href='#' data-bs-target='#viewusermodal' data-bs-toggle='modal' data-target='#viewusermodal' class="text-danger"><i class="fa-solid fa-trash"></i></a> -->
                        <a href="/php-crud-test/partials/delete.php?id=<?= $row['id'] ?>" class="text-danger "><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
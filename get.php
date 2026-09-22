<?php
include ("PDO.php");
$sql = "SELECT * FROM students";
$stmt = $conn->prepare($sql);
$stmt->execute();
$student = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="create.php">Create data</a>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>age</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
              <?php foreach ($student as $stu) : ?>
            <tr>
                <td><?= $stu['id']?></td>
                <td><?=  $stu['name'] ?></td>
                <td><?=  $stu['email'] ?></td>
                <td><?=  $stu['age'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $stu['id'] ?>">Edit</a>
                    <a href="delete.php?id=<?= $stu['id'] ?>">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
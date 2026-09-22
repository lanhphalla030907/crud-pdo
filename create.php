<?php
include ("PDO.php");
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $sql = "INSERT INTO students (name,email,age) VALUES (?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        $name,$email,$age
    ]);
    header("Location:get.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="get.php">back</a>
    <form method="POST">
        <input type="text" name="name" placeholder="name">
        <input type="number" name="age" placeholder="age">
        <input type="email" name="email" placeholder="email">
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
<?php
include "PDO.php";
 if(isset($_POST['register'])){
      $name = $_POST['name'];
    $email = $_POST['email'];
    $password= $_POST['password'];
  
    $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (name, email, password)
            VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
     $stmt->execute([
        $name,$email,$hashedPassword
     ]);

    echo "Register successfully";
    header("Location:login.php");
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
    <form method="post">
        <input type="text" name="name"> 
        <input type="text" name="email">
        <input type="password" name="password">
        <button type="submit" name="register">Register</button>
    </form>
</body>
</html>

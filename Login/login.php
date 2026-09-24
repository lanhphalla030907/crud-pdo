<?php
session_start();
include("PDO.php");
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            header("Location: dashboard.php");
            exit();
        }else{
               echo "Wrong password";
        }
    }else{
        echo "user not found";
    }
}
?>


<form method="POST">

    <input
        type="email"
        name="email"
        placeholder="Email">

    <input
        type="password"
        name="password"
        placeholder="Password">

    <button type="submit" name="login">
        Login
    </button>

</form>
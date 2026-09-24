<?php
session_start();
if (!isset($_SESSION['user_id'])) {

    header("Location: login.php");
    exit();
}
?>
<h1>Welcome</h1>
<p>Hello <?php echo $_SESSION['user_name']; ?></p>
<a href="logout.php">Logout</a>
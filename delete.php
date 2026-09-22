<?php
include ("PDO.php");
$id = $_GET['id'];
$sql = "DELETE FROM students WHERE id=?";
$stmt= $conn->prepare($sql);
$stmt->execute([$id]);
echo "Delete successfully";
header("Location:get.php");
?>
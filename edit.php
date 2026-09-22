<?php
include ("PDO.php");
$id = $_GET['id'];
$sql = "SELECT * FROM students WHERE id=?";
$stmt= $conn->prepare($sql);
$stmt->execute([$id]);
$student = $stmt->fetch(PDO::FETCH_ASSOC);
if(isset($_POST['edit'])){
    $name = $_POST['name'];
     $email = $_POST['email'];
    $age = $_POST['age'];
    $sql2 = "UPDATE students SET name=?, email=? ,age=? WHERE id=?";
    $stmt1 = $conn->prepare($sql2);
    $stmt1->execute([
        $name,$email,$age,$id
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
    <form method="post">
        <input type="text" name="name" value="<?php echo $student['name']?>">
        <input type="number" name="age" value="<?php echo $student['age']?>">
        <input type="email" name="email" value="<?php echo $student['email']?>">
        <button type="submit" name="edit">Edit</button>
    </form>
</body>
</html>
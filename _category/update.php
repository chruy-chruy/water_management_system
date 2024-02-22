<?php 

include "../db_conn.php";
$category_name = ucwords($_POST['category']);
$rate = $_POST['rate'];
$id = $_GET['id'];

$sql ="UPDATE `category` SET `category_name`='$category_name',`rate`='$rate'
WHERE id = '$id'";
mysqli_query($conn, $sql);

header("location:edit.php?id=$id&message=Success! Changes has been saved successfully.");
?>
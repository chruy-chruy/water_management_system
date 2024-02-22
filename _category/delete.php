<?php 

include "../db_conn.php";
$id = $_GET['id'];

$sql ="DELETE FROM `category` WHERE id = '$id'";
mysqli_query($conn, $sql);

header("location:../_category?&message=Success! Category deleted successfully.");
?>
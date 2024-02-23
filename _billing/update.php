<?php 

include "../db_conn.php";
$user = $_GET['user'];
$customer_id = $_POST['customer_id'];
$current_reading = $_POST['current_reading'];
$total_reading = $_POST['total_reading'];
$total = $_POST['total_price'];
$current_reading_date = $_POST['current_reading_date'];
$due_date = $_POST['due_date'];
$status = ucwords($_POST['status']);
$id = $_GET['id'];

$sql ="UPDATE `billing` SET 
`user`='$user',
`current_reading`='$current_reading',
`total_reading`='$total_reading',
`total`='$total',
`reading_date`='$current_reading_date',
`due_date`='$due_date',
`status`='$status'
WHERE id = '$id'";
mysqli_query($conn, $sql);

header("location:edit.php?id=$id&message=Success! Changes has been saved successfully.");
?>
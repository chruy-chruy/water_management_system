<?php 
include "../db_conn.php";
$customer_id = $_POST['customer_id'];
$customer_name = ucwords($_POST['customer']);
$user = $_GET['user'];
$billing_id = $_GET['id'];

$total = $_POST['total_price'];
$status = ucwords($_POST['status']);

// check if resident is already exist
$squery =  mysqli_query($conn, "SELECT * from billing Where customer_name = '$customer_name' AND status = 'pending'");
while ($row = mysqli_fetch_array($squery)) {
    $customer_status = $row['status'];
};

$sql ="UPDATE `billing` SET 
`status`='$status'
WHERE id = '$billing_id'";
mysqli_query($conn, $sql);

     $sql1 = "INSERT INTO `payment`(`billing_id`, `customer_id`, `customer_name`, `user`, `amount`) 
     VALUES ('$billing_id','$customer_id ','$customer_name','$user','$total');";
    
    mysqli_query($conn, $sql1);

    header("location:../_payment?message=Success! new Payment has been saved successfully.");
 ?>
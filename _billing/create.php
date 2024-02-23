<?php 
include "../db_conn.php";
$customer_id = $_POST['customer_id'];
$customer_name = ucwords($_POST['customer']);
$user = $_GET['user'];
$previous_reading = $_POST['previous_reading'];
$rate = $_POST['rate'];
$previous_reading_date = $_POST['latest_reading_date'];
$current_reading = $_POST['current_reading'];
$total_reading = $_POST['total_reading'];
$total = $_POST['total_price'];
$current_reading_date = $_POST['current_reading_date'];
$due_date = $_POST['due_date'];
$status = ucwords($_POST['status']);
$category = ucwords($_POST['category']);

// check if resident is already exist
$squery =  mysqli_query($conn, "SELECT * from billing Where customer_name = '$customer_name' AND status = 'pending'");
while ($row = mysqli_fetch_array($squery)) {
    $customer_status = $row['status'];
};


if (empty($customer_status)){
     $sql1 = "INSERT INTO `billing`(
    `customer_id`,
    `customer_name`,
    `user`,
    `reading_date`,
    `previous_reading_date`,
    `previous_reading`,
    `current_reading`,
    `rate`,
    `total_reading`,
    `total`,
    `due_date`,
    `status`,
    `category`
    ) VALUES (
        '$customer_id',
        '$customer_name',
        '$user',
        '$current_reading_date',
        '$previous_reading_date',
        '$previous_reading',
        '$current_reading',
        '$rate',
        '$total_reading',
        '$total',
        '$due_date',
        '$status',
        '$category'
        )";
    
    mysqli_query($conn, $sql1);

    $sql2 = "UPDATE `customer` SET `latest_reading_date`='$current_reading_date', `water_reading`='$current_reading' WHERE id = '$customer_id'";
    mysqli_query($conn, $sql2);

    header("location:../_billing?message=Success! new Category has been saved successfully.");
}
else{
    header("location:../_billing/select_customer.php?message=Error! Customer has PENDING billing.");
    }
 ?>
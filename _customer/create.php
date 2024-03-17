<?php 

include "../db_conn.php";
$first_name = ucwords($_POST['first_name']);
$middle_name = ucwords($_POST['middle_name']);
$last_name = ucwords($_POST['last_name']);
$suffix = $_POST['suffix'];
$gender = $_POST['gender'];
$date_of_birth = $_POST['date_of_birth'];
$purok = ucwords($_POST['purok']);
$place_of_birth = ucwords($_POST['place_of_birth']);
$civil_status = ucwords($_POST['civil_status']);
$phone_number = $_POST['phone_number'];
$category = ucwords($_POST['category']);
$water_reading = ucwords($_POST['water_reading']);
$latest_reading_date = $_POST['latest_reading_date'];

// check if resident is already exist
$squery =  mysqli_query($conn, "SELECT * from customer Where first_name = '$first_name' AND middle_name = '$middle_name' AND last_name = '$last_name' AND suffix = '$suffix' AND del_status != 'deleted'");
while ($row = mysqli_fetch_array($squery)) {$check =  $row['first_name']; };

if (empty($check)){
     $sql2 = "INSERT INTO `customer`(
    `first_name`,
    `middle_name`,
    `last_name`,
    `suffix`,
    `gender`,
    `date_of_birth`,
    `purok`,
    `place_of_birth`,
    `civil_status`,
    `phone_number`,
    `category`,
    `water_reading`,
    `latest_reading_date`
    ) VALUES (
        '$first_name',
        '$middle_name',
        '$last_name',
        '$suffix',
        '$gender',
        '$date_of_birth',
        '$purok',
        '$place_of_birth',
        '$civil_status',
        '$phone_number',
        '$category',
        '$water_reading',
        '$latest_reading_date'
        )";
    
    mysqli_query($conn, $sql2);
    header("location:../_customer?message=Success! new Customer has been saved successfully.");
}
else{
    header("location:../_customer?message=Error! Customer already exist.");
    }
 ?>
<?php 

include "../db_conn.php";
$category_name = ucwords($_POST['category']);
$rate = $_POST['rate'];

// check if resident is already exist
$squery =  mysqli_query($conn, "SELECT * from category Where category_name = '$category_name'");
while ($row = mysqli_fetch_array($squery)) {$check =  $row['category_name'];};

if (empty($check)){
     $sql2 = "INSERT INTO `category`(
    `category_name`,
    `rate`
    ) VALUES (
        '$category_name',
        '$rate')";
    
    mysqli_query($conn, $sql2);
    header("location:../_category?message=Success! new Category has been saved successfully.");
}
else{
    header("location:../_category?message=Error! Category already exist.");
    }
 ?>
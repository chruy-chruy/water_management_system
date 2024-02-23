<?php 

include "../db_conn.php";
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

// check if username is already exist
$squery =  mysqli_query($conn, "SELECT * from user Where username = '$username'");
while ($row = mysqli_fetch_array($squery)) {$check =  $row['username'];};

if (empty($check)){
     $sql2 = "INSERT INTO `user`(
    `username`,
    `password`,
    `role`
    ) VALUES (
        '$username',
        '$password',
        '$role')";
    
    mysqli_query($conn, $sql2);
    header("location:../_user?message=Success! new Category has been saved successfully.");
}
else{
    header("location:../_user?message=Error! Username already exist.");
    }
 ?>
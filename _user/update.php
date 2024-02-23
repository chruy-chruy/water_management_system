<?php 

include "../db_conn.php";
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];
$id = $_GET['id'];
$squery =  mysqli_query($conn, "SELECT * from user Where username = '$username'");
while ($row = mysqli_fetch_array($squery)) {$check =  $row['username'];};

if (empty($check)){
$sql ="UPDATE `user` SET `username`='$username',`password`='$password',`role`='$role'
WHERE id = '$id'";
mysqli_query($conn, $sql);

header("location:edit.php?id=$id&message=Success! Changes has been saved successfully.");
}
else{
    header("location:edit.php?id=$id&message=Error! Username already exist.");
    }
?>
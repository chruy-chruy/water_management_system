<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: ../index.php");
    exit();
}
 ?>

<!DOCTYPE html>
<html>
<head>
    
<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="icon" type="image/x-icon" href="../assets/img/logo.ico">
    <link rel="stylesheet" href="../includes/fontawesome-free-5.15.4-web/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

    <!-- datatable -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <script src="../assets/js/jquery-3.5.1.js"></script> 

    <!-- <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> -->
    <script src="../assets/js/jquery.dataTables.min.js"></script> 

    <!-- <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script> -->
    <script src="../assets/js/dataTables.bootstrap5.min.js"></script>

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css"> -->
    <link rel="stylesheet" href="../assets//css/dataTables.bootstrap5.min.css">

    <!--Stylesheet-->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/sidebar.css">

</head>
<body>
<div class="sidebar">
<label for=""><img src="../assets/img/logo.png" alt="" class="login-logo-mini">WBMS</label>
  <a class="<?php if ($page == 'Dashboard') {echo 'active';} ?>" href="../_dashboard"><i class="fas fa-chart-bar"></i>Dashboard</a>
  <a class="<?php if ($page == 'Customer') {echo 'active';} ?>" href="../_customer"><i class="fas fa-id-card-alt"></i>Customer</a>
  <a class="<?php if ($page == 'Category') {echo 'active';} ?>" href="../_category"><i class="fas fa-bars"></i>Category</a>
  <a class="<?php if ($page == 'Billing') {echo 'active';} ?>" href="../_billing"><i class="fas fa-wallet"></i>Billing</a>
  <a class="<?php if ($page == 'Payment') {echo 'active';} ?>" href="../_payment"><i class="fas fa-wallet"></i>Payment</a>
  <?php if($_SESSION['role'] == 'administrator'){?>
  <a class="<?php if ($page == 'User') {echo 'active';} ?>" href="../_user"><i class="fas fa-users"></i>User</a>
  <?php  }  ?>
  <a class="<?php if ($page == 'Logout') {echo 'active';} ?>" href="../logout.php"><i class="fas fa-solid fa-arrow-right"></i>Logout</a>
</div>


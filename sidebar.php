<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: ../index.php");
    exit();
}
 ?>


<div class="sidebar">
<img src="../assets/img/logo.png" alt="" class="login-logo-mini">
  <a class="active" href="#home"><i class="fas fa-chart-bar"></i>Dashboard</a>
  <a href="#news"><i class="fas fa-id-card-alt"></i>Customer</a>
  <a href="#contact"><i class="fas fa-wallet"></i>Billing</a>
  <a href="#about"><i class="fas fa-users"></i>User</a>
</div>


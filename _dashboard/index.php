<?php 
$page = 'Dashboard';
if(isset($_GET['message'])){
    $message = $_GET['message'];
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
include_once "../sidebar.php";
include_once "../db_conn.php";
 ?>
 <div class="header">
<h1><?php if ($page) {echo $page;} ?></h1>
</div>
<div class="content">



    </div>
 </body>
 </html>
 <script src="../assets/js/table.js"></script>
 
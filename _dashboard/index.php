<?php 
$page = 'Dashboard';
if(isset($_GET['message'])){
    $message = $_GET['message'];
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
include_once "../sidebar.php";
include_once "../db_conn.php";

$squery1 =  mysqli_query($conn, "SELECT COUNT(id) as 'count' FROM customer;");
$customer = mysqli_fetch_array($squery1);

$squery2 =  mysqli_query($conn, "SELECT COUNT(id) as 'count' FROM billing;");
$billing = mysqli_fetch_array($squery2);

$squery3 =  mysqli_query($conn, "SELECT COUNT(id) as 'count' FROM billing where status = 'Paid';");
$paid = mysqli_fetch_array($squery3);

$squery4 =  mysqli_query($conn, "SELECT COUNT(id) as 'count' FROM billing where status = 'Pending';");
$pending = mysqli_fetch_array($squery4);
 ?>
 <div class="header">
<h1><?php if ($page) {echo $page;} ?></h1>
</div>
<div class="content">

<div class="row my-3">
  <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
      <div class="card">
          <h5 class="card-header">Customer</h5>
          <div class="card-body">
            <h5 class="card-title"><i class="fas fa-solid fa-user-check fa-2xl" style="color: #3ea7b8;font-size:40px;"></i><span style="float:right; font-size:40px;">
          <?php  echo $customer['count']; ?></span></h5>
          </div>
        </div>
  </div>  
  <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
      <div class="card">
          <h5 class="card-header">Billing</h5>
          <div class="card-body">
            <h5 class="card-title"><i class="fas fa-solid fa-money-bill fa-2xl" style="color: #3ea7b8;font-size:40px;"></i><span style="float:right; font-size:40px;">
            <?php  echo $billing['count']; ?></span></h5>
          </div>
        </div>
  </div>
  <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
      <div class="card">
          <h5 class="card-header">Paid</h5>
          <div class="card-body">
            <h5 class="card-title"><i class="fas fa-solid fa-check-double fa-2xl" style="color: #3ea7b8;font-size:40px;"></i><span style="float:right; font-size:40px;">
            <?php  echo $paid['count']; ?></span></h5>
          </div>
        </div>
  </div>
  <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
      <div class="card">
          <h5 class="card-header">Pending</h5>
          <div class="card-body">
            <h5 class="card-title"><i class="fas fa-solid fa-ban fa-2xl" style="color: #3ea7b8;font-size:40px;"></i><span style="float:right; font-size:40px;">
            <?php  echo $pending['count']; ?></span></h5>
          </div>
        </div>
  </div>
</div>

<div class="row my-3">
  <div class="col-6 col-xl-6 mb-12 mb-lg-0">
      <div class="card">
          <h5 class="card-header">Latest Billing Transactions</h5>
          <div class="card-body">
              <div class="table-responsive">
              <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Total</th>
                <th>Status</th>
                <th>Due Date</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $squery =  mysqli_query($conn, "SELECT * from billing order by id desc LIMIT 5");
         while ($row = mysqli_fetch_array($squery)) {
        ?>
            <tr>
            <td><?php echo $row['id'] ?></td>
            <td ><?php echo $row['customer_id'] ." - ". $row['customer_name']  ?></td>
            <td><?php echo $row['total'] ?></td>
            <td style="color:<?php 
            if($row['status'] == 'Paid'){
                echo 'green';
            }else if($row['status'] == 'Pending'){
                echo 'red';
            }
            ?>;
            font-weight:bold;
            ">
            <?php echo $row['status'] ?>
        </td>
            <td><?php echo $row['due_date'] ?></td>
            </tr> <?php }?>
            </tbody>
    </table>
      </div>
  </div>
</div>
</div>


  <div class="col-6 col-xl-6 mb-12 mb-lg-0">
      <div class="card">
          <h5 class="card-header">Latest Payment Transactions</h5>
          <div class="card-body">
              <div class="table-responsive">
              <table class="table">
              <thead>
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Total</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $squery =  mysqli_query($conn, "SELECT * from payment");
         while ($row = mysqli_fetch_array($squery)) {
        ?>
            <tr>
            <td><?php echo $row['id'] ?></td>
            <td ><?php echo $row['customer_id'] ." - ". $row['customer_name']  ?></td>
            <td><?php echo $row['amount'] ?></td>
            <td><?php echo $row['date_created'] ?></td>
            </tr> <?php }?>
            </tbody>
    </table>
    </div>
  </div>
</div>
</div>
</div>




</div>
 </body>
 </html>
 <script src="../assets/js/table.js"></script>
 
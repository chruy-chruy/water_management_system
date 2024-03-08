<?php 
$page = 'Payment';
if(isset($_GET['message'])){
    $message = $_GET['message'];
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
include_once "../sidebar.php";
include_once "../db_conn.php";
 ?>
<div class="header">
<!-- <img src="../assets/img/logo.png" alt="" class="logo"> -->
<h1 class="title-page"><?php if ($page) {echo "Select Billing";} ?></h1>
</div>
<div class="content">
<a href="./" class="btn btn-secondary">Back</a>

<table id="table" class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Total</th>
                <th>Status</th>
                <th>Due Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $squery =  mysqli_query($conn, "SELECT * from billing WHERE status = 'Pending'");
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
            <td><a href="add.php?id=<?php echo $row['id'] ?>"  class="btn btn-primary">Select</a></td>
            </tr> <?php }?>
            </tbody>
    </table>
    </div>
 </body>
 </html>
 <script src="../assets/js/table.js"></script>
 
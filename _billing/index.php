<?php 
$page = 'Billing';
if(isset($_GET['message'])){
    $message = $_GET['message'];
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
include_once "../sidebar.php";
include_once "../db_conn.php";
 ?>
<div class="header">
<!-- <img src="../assets/img/logo.png" alt="" class="logo"> -->
<h1 class="title-page"><?php if ($page) {echo $page;} ?></h1>
</div>
<div class="content">
<div class="add">
    <a href="select_customer.php"><button type="button" class="btn btn-primary">Add Billing</button></a>
</div>
 <table id="table" class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer ID</th>
                <th>Total</th>
                <th>Status</th>
                <th>Due Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $squery =  mysqli_query($conn, "SELECT * from billing");
         while ($row = mysqli_fetch_array($squery)) {
        ?>
            <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['customer_id'] ?></td>
            <td><?php echo $row['total'] ?></td>
            <td><?php echo $row['status'] ?></td>
            <td><?php echo $row['due_date'] ?></td>
            <td><a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-outline-info">Edit</a></td>
            </tr> <?php }?>
            </tbody>
    </table>
    </div>
 </body>
 </html>
 <script src="../assets/js/table.js"></script>
 
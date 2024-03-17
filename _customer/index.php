<?php 
$page = 'Customer';
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
    <a href="add.php"><button type="button" class="btn btn-primary">Add Customer</button></a>
</div>
 <table id="table" class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Purok/Sitio</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $squery =  mysqli_query($conn, "SELECT * from customer where del_status != 'deleted'");
         while ($row = mysqli_fetch_array($squery)) {
        ?>
            <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name']." ".$row['suffix'] ?></td>
            <td><?php echo $row['purok'] ?></td>
            <td><?php echo $row['category'] ?></td>
            <td><a href="edit.php?id=<?php echo $row['id'] ?>"  class="btn btn-outline-info">View</a></td>
            </tr> <?php }?>
            </tbody>
    </table>
    </div>
 </body>
 </html>
 <script src="../assets/js/table.js"></script>
 
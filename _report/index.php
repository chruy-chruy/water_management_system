<?php 
$page = 'Report';
if(isset($_GET['message'])){
    $message = $_GET['message'];
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
  include_once "../sidebar.php";
include_once "../db_conn.php";
 
    $status = 'All';
    $month = 'All';
    if(isset($_POST['status']) && isset($_POST['month'])){
        $status = $_POST['status'];
        $month = $_POST['month'];
    }
    $query = "SELECT * from billing";
    if($status != 'All'){
        $query .= " where status = '$status'";
    }
    if($month != 'All'){
        if($status != 'All'){
            $date = strtotime($month . ' 1');
            // Use date function to get the month number
            $monthNumber = date('m', $date);
            $query .= " and month(due_date) = '$monthNumber'";
        }else{
            $date = strtotime($month . ' 1');
            // Use date function to get the month number
            $monthNumber = date('m', $date);
            $query .= " where month(due_date) = '$monthNumber'";
        }
    }
    $query = mysqli_query($conn, $query);


 ?>
<div class="header">
<!-- <img src="../assets/img/logo.png" alt="" class="logo"> -->
<h1 class="title-page"><?php if ($page) {echo $page;} ?></h1>
</div>
<div class="content">
<div class="add">
<form class="row" method="POST" action="index.php">
    <div class="col-2">
        <label for="statusSelect">Status</label>
        <select class="form-select" id="statusSelect" name="status">
            <option selected hidden value="<?php echo $status ?>" selected><?php echo $status ?></option>
            <option value="All">All</option>
            <option value="Pending">Pending</option>
            <option value="Paid">Paid</option>
        </select>
    </div>
    <div class="col-2">
        <label for="monthSelect">Month</label>
        <select class="form-select" id="monthSelect" name="month">
            <option selected hidden value="<?php echo $month ?>" selected><?php echo $month ?></option>
            <option value="All">All</option>
            <option value="January">January</option>
            <option value="February">February</option>
            <option value="March">March</option>
            <option value="April">April</option>
            <option value="May">May</option>
            <option value="June">June</option>
            <option value="July">July</option>
            <option value="August">August</option>
            <option value="September">September</option>
            <option value="October">October</option>
            <option value="November">November</option>
            <option value="December">December</option>
        </select>
    </div>
    <div class="col-1">
        <label for="filterButton"> </label>
        <button type="submit" class="form-control btn btn-danger" id="filterButton">Filter</button>
    </div>
    <div class="col-1">
</form>

<label for="autoSizingInput"> </label>
        <a href="print.php?status=<?php echo $status ?>&month=<?php echo $month ?>"><button type="button" class="form-control btn btn-success">Print</button></a>
    </div>
</div>
 <table id="table" class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Purok/Sitio</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Due Date</th>
            </tr>
        </thead>
        <tbody>
        <?php
    //    $squery =  mysqli_query($conn, "SELECT * from billing");
       while ($row = mysqli_fetch_array($query)) {
          $customer_id =  $row['customer_id'];
      $squery1 =  mysqli_query($conn, "SELECT * from customer where id = '$customer_id'");
      $customer = mysqli_fetch_array($squery1);
        ?>
            <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['customer_id'] ." - ". $row['customer_name']  ?></td>
            <td><?php echo $customer['purok'] ?></td>
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
 </body>
 </html>
 <script src="../assets/js/table.js"></script>
 
<?php 
$page = 'Report';
if(isset($_GET['message'])){
    $message = $_GET['message'];
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
  include_once "../db_conn.php";

      $status = $_GET['status'];
      $month = $_GET['month'];
  
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
 
 <script>
window.onload = function() {
    window.print();
}
window.onafterprint = function() {
    window.location.href = 'index.php';
}
</script>
<!DOCTYPE html>
 <html lang="en">
 <head>
   <title>Print Report</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
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

 </head>
 <style>

      .logo1{
            height:70px;
        }
        .logo2{
            height:70px;
        }

 </style>
 <body>
 
 <div class="container mt-5 position-relative">
        <div class="logos d-flex position-absolute justify-content-center w-100 pe-4 align-items-center gap-5">
        <img class="logo1" src="../assets/img/logo.png" alt="" srcset="">
        <address class="text-middle fw-bold fs-5" style="text-align: center;">
            Water Billing Management System<br>
            Barangay Tamban Malungon Sarangani Province<br>
        </address>
        <img class="logo2" src="../assets/img/logo2.png" alt="" srcset="">
        </div>
   
<br>
<br>
   <table id="table" class="table table-striped mt-5">
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
 
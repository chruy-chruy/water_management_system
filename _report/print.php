<?php 
$page = 'Report';
if(isset($_GET['message'])){
    $message = $_GET['message'];
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
  $id = $_GET['id'];
  include_once "../db_conn.php";
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
 <body>
 
 <div class="container mt-3">
 <h1 style="text-align:center;">Report</h1>
    <?php 
     $squery1 =  mysqli_query($conn, "SELECT * from payment where customer_id = '$id'");
     $row1 = mysqli_fetch_array($squery1);
     if(empty( $row1['customer_name']))
     {
         ?>
         <br>
         <h2>NO DATA</h2>
         <?php }
    else{?>
<br>
   <h2><?php echo $row1['customer_name'];?></h2>           
   <table class="table table-striped">
   <thead>
            <tr>
                <th>Customer</th>
                <th>Total</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $squery =  mysqli_query($conn, "SELECT * from payment where customer_id = '$id'");
         while ($row = mysqli_fetch_array($squery)) {
        ?>
            <tr>
            <td ><?php echo $row['customer_name']  ?></td>
            <td><?php echo $row['amount'] ?></td>
            <td><?php echo $row['date_created'] ?></td>
            </tr> <?php }}?>
            </tbody>
   </table>
 </div>
 
 </body>
 </html>
 
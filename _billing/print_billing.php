<?php 
$page = 'Billing';
if(isset($_GET['message'])){
    $message = $_GET['message'];
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
include_once "../db_conn.php";
// $user = $_SESSION['username']." ". $_SESSION['role'];
$id = $_GET['id'];
$squery =  mysqli_query($conn, "SELECT * from billing where id = $id");
while ($row = mysqli_fetch_array($squery)) {
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../assets/css/billing.css">

</head>
<script>
window.onload = function() {
    window.print();
}
window.onafterprint = function() {
    window.location.href = 'index.php';
}
</script>
<body>
    <table class="body-wrap">
        <tbody>
            <tr>
                <td></td>
                <td class="container" width="600">
                    <div class="content">
                        <table class="main" width="100%" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td class="content-wrap aligncenter">
                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td class="content-block">
                                                        <h2>Water Billing Notice</h2>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="content-block">
                                                        <table class="invoice">
                                                            <tbody>
                                                                <tr>
                                                                    <td><?php echo $row['customer_name']?>
                                                                        <br>Billing #<?php echo $row['id']?>
                                                                        <br><?php echo date('Y-m-d'); ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <table class="invoice-items" cellpadding="0"
                                                                            cellspacing="0">
                                                                            <tbody>
                                                                                <tr class="bill">
                                                                                    <td>Period From</td>
                                                                                    <td class="alignright"><?php echo $row['previous_reading_date']?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Period To</td>
                                                                                    <td class="alignright"><?php echo $row['reading_date']?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Due Date</td>
                                                                                    <td class="alignright"><?php echo $row['due_date']?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr class="bill">
                                                                                    <td>Present Reading</td>
                                                                                    <td class="alignright"><?php echo $row['current_reading']?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Previous Reading</td>
                                                                                    <td class="alignright"><?php echo $row['previous_reading']?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Consumption</td>
                                                                                    <td class="alignright"><?php echo $row['total_reading']?></td>
                                                                                </tr>
                                                                                <tr class="total">
                                                                                    <td class="alignright" width="80%">
                                                                                        Total Bill</td>
                                                                                    <td class="alignright"><?php echo $row['total']?></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <!-- <td class="content-block">
                                                        <a href="#">View in browser</a>
                                                    </td> -->
                                                </tr>
                                                <tr>
                                                    <td class="content-block">
                                                        Barangay 123 , Malungon, Sarangani Province
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
                <td></td>
            </tr>
        </tbody>
    </table>
</body>
</html>
<?php }?>
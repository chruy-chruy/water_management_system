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
    $customer_id = $row["customer_id"];
    $squery2 =  mysqli_query($conn, "SELECT * from customer where id = $customer_id");
    $customer = mysqli_fetch_array($squery2)
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pring Billing</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
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


    <style>
        body {
            margin-top: 20px;
            color: #2e323c;
            background: #ffffff;
            position: relative;
            height: 100%;
        }

        .invoice-container {
            padding: 1rem;
        }

        .invoice-container .invoice-header .invoice-logo {
            margin: 0.8rem 0 0 0;
            display: inline-block;
            font-size: 1.6rem;
            font-weight: 700;
            color: #2e323c;
        }

        .invoice-container .invoice-header .invoice-logo img {
            max-width: 130px;
        }

        .invoice-container .invoice-header address {
            font-size: 1.2rem;
            color: #0f0f0f;
            margin: 0;
        }

        .invoice-container .invoice-details {
            margin: 1rem 0 0 0;
            padding: 1rem;
            line-height: 180%;
            background: #f5f6fa;
        }

        .invoice-container .invoice-details .invoice-num {
            text-align: right;
            font-size: 0.8rem;
        }

        .invoice-container .invoice-body {
            padding: 1rem 0 0 0;
        }

        .invoice-container .invoice-footer {
            text-align: center;
            font-size: 0.7rem;
            margin: 5px 0 0 0;
        }

        .invoice-status {
            text-align: center;
            padding: 1rem;
            background: #ffffff;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            margin-bottom: 1rem;
        }

        .invoice-status h2.status {
            margin: 0 0 0.8rem 0;
        }

        .invoice-status h5.status-title {
            margin: 0 0 0.8rem 0;
            color: #9fa8b9;
        }

        .invoice-status p.status-type {
            margin: 0.5rem 0 0 0;
            padding: 0;
            line-height: 150%;
        }

        .invoice-status i {
            font-size: 1.5rem;
            margin: 0 0 1rem 0;
            display: inline-block;
            padding: 1rem;
            background: #f5f6fa;
            -webkit-border-radius: 50px;
            -moz-border-radius: 50px;
            border-radius: 50px;
        }

        .invoice-status .badge {
            text-transform: uppercase;
        }

        @media (max-width: 767px) {
            .invoice-container {
                padding: 1rem;
            }
        }


        .custom-table {
            border: 1px solid #e0e3ec;
        }

        .custom-table thead {
            background: #007ae1;
        }

        .custom-table thead th {
            border: 0;
            color: #ffffff;
        }

        .custom-table>tbody tr:hover {
            background: #fafafa;
        }

        .custom-table>tbody tr:nth-of-type(even) {
            background-color: #ffffff;
        }

        .custom-table>tbody td {
            border: 1px solid #e6e9f0;
        }


        .card {
            background: #ffffff;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            border: 0;
            margin-bottom: 1rem;
            border: black 1px solid;
        }

        .text-success {
            color: #00bb42 !important;
        }

        .text-muted {
            color: #9fa8b9 !important;
        }

        .custom-actions-btns {
            margin: auto;
            display: flex;
            justify-content: flex-end;
        }

        .custom-actions-btns .btn {
            margin: .3rem 0 .3rem .3rem;
        }

        .info {
            text-decoration: underline;
        }

        .hide-copy {
            display: none;
        }

        .broken-line {
            width: 100%;
            height: 4px;
            /* Adjust height as needed */
            background-image: linear-gradient(to right, black 50%, transparent 50%);
            background-size: 10px 100%;
            /* Adjust size for the breaks */
            background-repeat: repeat-x;
        }

        @media print {

            @page {
                margin: none;
            }

            .hide-copy {
                display: block;

                .invoice-container .invoice-details {
                    margin: 1rem 0 0 0;
                    padding: 1rem;
                    line-height: 180%;
                    background: #ffd478ce;
                }
            }

            .card {

                border: black 1px solid;
                width: 700px;
                margin: none;
            }

            body {
                color: #2e323c;
                background: #ffffff;
                height: auto;
            }

            * {
                font-size: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="invoice-container">
                            <div class="invoice-header">

                                <!-- Row start -->
                                <div class="row gutters">
                                    <div class="col-lg-12">
                                        <address class="text-middle" style="text-align: center;">
                                            Water Billing Management System<br>
                                            Barangay Tamban Malungon Sarangani Province<br>
                                        </address>
                                    </div>
                                </div>
                                <!-- Row end -->
                                <!-- Row start -->
                                <div class="row gutters">
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">
                                        <div class="invoice-details">
                                            <address>
                                                Account Name: <span class="info"><?php echo $row["customer_name"] ?></span><br>
                                                Address: <span class="info"><?php echo $customer["purok"] ?></span>
                                            </address>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                        <div class="invoice-details">
                                            <address>
                                                Billing Number: <span class="info"><?php echo $row["id"] ?></span><br>
                                                Date: <span class="info"><?php echo $row["reading_date"] ?></span>
                                            </address>
                                        </div>
                                    </div>
                                </div>
                                <!-- Row end -->
                            </div>
                            <div class="invoice-body">
                                <!-- Row start -->
                                <div class="row gutters">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table custom-table m-0">
                                                <tbody>
                                                    <tr>
                                                        <th colspan="2" style="text-align: center;"> Period from:
                                                        <?php echo $row["previous_reading_date"] ?>
                                                            to 
                                                        <?php echo $row["reading_date"] ?></th>
                                                    </tr>
                                                    <tr>

                                                        <td>Previous Reading</td>
                                                        <td><?php echo $row["previous_reading"] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Present Reading</td>
                                                        <td><?php echo $row["current_reading"] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total Consumption</td>
                                                        <td><?php echo $row["total_reading"] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Water Rate</td>
                                                        <td><?php echo $row["rate"] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h5><strong>Grand Total</strong></h5>
                                                        </td>
                                                        <td>
                                                            <h5><strong>₱<?php echo $row["total"] ?></strong></h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h5><strong>Due Date: <?php echo $row["due_date"] ?></strong></h5>
                                                            <h5><strong class="text-danger">Disconnection Date:  <?php echo date('Y-m-d', strtotime($row["due_date"] . ' +10 days')) ?>
                                                                </strong></h5>
                                                        </td>
                                                        <td>
                                                            <p style="text-align: center;">
                                                                <strong>Importante napahibalo</strong>
                                                                <br>
                                                                Kini nga balayran hangtod
                                                                <br>
                                                                napulo lang ka adlaw sugod sa
                                                                <br>
                                                                pagdawat sa waterbill. <br>
                                                                Kun dili makabayad posible
                                                                <br>
                                                                nga maputulan ug serbisyo.
                                                            </p>
                                                        </td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Row end -->
                            </div>
                            <div class="invoice-footer">
                                <!-- Daghang Salamat -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<br>
    <div class="hide-copy">
        <div class="broken-line"></div>
        <br>
        <div class="container">
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="invoice-container">
                            <div class="invoice-header">

                                <!-- Row start -->
                                <div class="row gutters">
                                    <div class="col-lg-12">
                                        <address class="text-middle" style="text-align: center;">
                                            Water Billing Management System<br>
                                            Barangay Tamban Malungon Sarangani Province<br>
                                        </address>
                                    </div>
                                </div>
                                <!-- Row end -->
                                <!-- Row start -->
                                <div class="row gutters">
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">
                                        <div class="invoice-details">
                                            <address>
                                                Account Name: <span class="info"><?php echo $row["customer_name"] ?></span><br>
                                                Address: <span class="info"><?php echo $customer["purok"] ?></span>
                                            </address>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                        <div class="invoice-details">
                                            <address>
                                                Billing Number: <span class="info"><?php echo $row["id"] ?></span><br>
                                                Date: <span class="info"><?php echo $row["reading_date"] ?></span>
                                            </address>
                                        </div>
                                    </div>
                                </div>
                                <!-- Row end -->
                            </div>
                            <div class="invoice-body">
                                <!-- Row start -->
                                <div class="row gutters">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table custom-table m-0">
                                                <tbody>
                                                    <tr>
                                                        <th colspan="2" style="text-align: center;"> Period from:
                                                        <?php echo $row["previous_reading_date"] ?>
                                                            to 
                                                        <?php echo $row["reading_date"] ?></th>
                                                    </tr>
                                                    <tr>

                                                        <td>Previous Reading</td>
                                                        <td><?php echo $row["previous_reading"] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Present Reading</td>
                                                        <td><?php echo $row["current_reading"] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total Consumption</td>
                                                        <td><?php echo $row["total_reading"] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Water Rate</td>
                                                        <td><?php echo $row["rate"] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h5><strong>Grand Total</strong></h5>
                                                        </td>
                                                        <td>
                                                            <h5><strong>₱<?php echo $row["total"] ?></strong></h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h5><strong>Due Date: <?php echo $row["due_date"] ?></strong></h5>
                                                            <h5><strong class="text-danger">Disconnection Date:  <?php echo date('Y-m-d', strtotime($row["due_date"] . ' +10 days')) ?>
                                                                </strong></h5>
                                                        </td>
                                                        <td>
                                                            <p style="text-align: center;">
                                                                <strong>Importante napahibalo</strong>
                                                                <br>
                                                                Kini nga balayran hangtod
                                                                <br>
                                                                napulo lang ka adlaw sugod sa
                                                                <br>
                                                                pagdawat sa waterbill. <br>
                                                                Kun dili makabayad posible
                                                                <br>
                                                                nga maputulan ug serbisyo.
                                                            </p>
                                                        </td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Row end -->
                            </div>
                            <div class="invoice-footer">
                                <!-- Daghang Salamat -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
<?php }?>
<?php 
$page = 'Dashboard';
if(isset($_GET['message'])){
    $message = $_GET['message'];
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
include_once "../sidebar.php";
include_once "../db_conn.php";

$squery1 =  mysqli_query($conn, "SELECT COUNT(id) as 'count' FROM customer where del_status != 'deleted';");
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
  
<!-- 
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
</div> -->

<?php
// Create an array of all months you want to display
$all_months = [];
for ($i = 1; $i <= 12; $i++) {
    $all_months[] = date('Y-m', mktime(0, 0, 0, $i, 1));
}

// SQL query to get the count of rows per month
$sql1 = "
SELECT DATE_FORMAT(date_created, '%Y-%m') AS month,
COUNT(*) AS row_count
FROM billing
GROUP BY DATE_FORMAT(date_created, '%Y-%m')
ORDER BY month
";

$result = $conn->query($sql1);

// Fetch all the rows into an associative array
$rows = [];
while ($row = $result->fetch_assoc()) {
    $rows[$row['month']] = $row['row_count'];
}

// Prepare final data with counts for all months
$data1 = [];
foreach ($all_months as $month) {
    $row_count = isset($rows[$month]) ? $rows[$month] : 0;
    $data[] = ['month' => $month, 'row_count' => $row_count];
}       ?>
 
 
<div class="col-6">
      <div class="card">
          <h5 class="card-header">Billing Transactions</h5>
          <div class="card-body">
          <div>
  <canvas id="barChart"></canvas>
</div>
  </div>
</div>
</div>
<script src="../assets/js/chart.js"></script>
<script>
        // Data from PHP
        var data1 = <?php echo json_encode($data); ?>;

        // Prepare labels and data for Chart.js
        var labels = data1.map(function(item) {
            return item.month;
        });
        var values = data1.map(function(item) {
            return item.row_count;
        });
        var monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        // Create bar chart
        var ctx = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(ctx, {
            type: 'bar',
            data: { 
              labels: labels.map(function(month) {
            // Convert month string (YYYY-MM) to month name
            var parts = month.split('-');
            var monthNumber = parseInt(parts[1]);
            return monthNames[monthNumber - 1];
        }),
                datasets: [{
                    label: 'Billing',
                    data: values,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                    stepSize: 1
                },max:50
                    }
                    
                }
            }
        });
    </script>

<div class="col-6">
      <div class="card">
          <h5 class="card-header">Payment Transactions</h5>
          <div class="card-body">
          <div>
          <?php
// Create an array of all months you want to display
$all_months = [];
for ($i = 1; $i <= 12; $i++) {
    $all_months[] = date('Y-m', mktime(0, 0, 0, $i, 1));
}

// SQL query to get the count of rows per month
$sql = "
SELECT DATE_FORMAT(date_created, '%Y-%m') AS month,
COUNT(*) AS row_count
FROM payment
GROUP BY DATE_FORMAT(date_created, '%Y-%m')
ORDER BY month
";

$result = $conn->query($sql);

// Fetch all the rows into an associative array
$rows = [];
while ($row = $result->fetch_assoc()) {
    $rows[$row['month']] = $row['row_count'];
}

// Prepare final data with counts for all months
$data = [];
foreach ($all_months as $month) {
    $row_count = isset($rows[$month]) ? $rows[$month] : 0;
    $data[] = ['month' => $month, 'row_count' => $row_count];
}

        ?>
  <canvas id="barChart2"></canvas>
</div>
  </div>
</div>
</div>
</div> 


<script>
        // Data from PHP
        var data = <?php echo json_encode($data); ?>;

        // Prepare labels and data for Chart.js
        var labels = data.map(function(item) {
            return item.month;
        });
        var values = data.map(function(item) {
            return item.row_count;
        });
        var monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

// Create bar chart
var ctx = document.getElementById('barChart2').getContext('2d');
var barChart = new Chart(ctx, {
    type: 'bar',
    data: { 
      labels: labels.map(function(month) {
    // Convert month string (YYYY-MM) to month name
    var parts = month.split('-');
    var monthNumber = parseInt(parts[1]);
    return monthNames[monthNumber - 1];
}),
                datasets: [{
                    label: 'Payment',
                    data: values,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                    stepSize: 1
                },max:50
                    }
                    
                }
            }
        });
    </script>



</div>
 </body>
 </html>
 <script src="../assets/js/table.js"></script>
 
<?php 
$page = 'Billing';
if(isset($_GET['message'])){
    $message = $_GET['message'];
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
include_once "../sidebar.php";
include_once "../db_conn.php";
$user = $_SESSION['username']." ". $_SESSION['role'];
$id = $_GET['id'];
$squery =  mysqli_query($conn, "SELECT * from billing where id = $id");
while ($row = mysqli_fetch_array($squery)) {
 ?>
 <div class="header">
<h1>Add <?php if ($page) {echo $page;} ?></h1>
</div>
<div class="content">
<form class="row g-3" method="POST" action="update.php?user=<?php echo $user; ?>&id=<?php echo $id; ?>">
  <h1>Billing Information</h1>

  <div class="col-md-4">
    <label for="exampleDataList" class="form-label">Customer</label>
    <input required readonly class="form-control" id="exampleDataList" name="customer" value="<?php echo $row['customer_name']?>">
  </div>

  <div class="col-md-4">
    <label for="rate" class="form-label">Customer ID</label>
    <input required readonly type="text" class="form-control" name="customer_id"  value="<?php echo $row['customer_id'] ?>" >
  </div>

  <div class="col-md-4">
    <label for="rate" class="form-label">Category</label>
    <input required readonly type="text" class="form-control" name="category" value="<?php echo $row['category'] ?>" >
  </div>
  
  <div class="col-md-4">
    <label for="rate" class="form-label">Previous Reading</label>
    <input required readonly type="text" class="form-control" name="previous_reading" id="previous_reading" value="<?php echo $row['previous_reading'] ?>" >
  </div>

  <div class="col-md-4">
    <label for="rate" class="form-label">Rate</label>

    <input required readonly type="text" class="form-control" name="rate" id="rate" value="<?php echo $row['rate'] ?>" >
  </div>
  
  <div class="col-md-4">
    <label for="latest_reading_date" class="form-label">Date of Last Reading</label>
    <input readonly required type="date" class="form-control" name="latest_reading_date" id="latest_reading_date" value="<?php echo $row['previous_reading_date']  ?>">
  </div>

  <div class="col-md-4">
    <label for="rate" class="form-label">Current Reading</label>
    <input required  type="number" step=0.0001 class="form-control" name="current_reading" id="current_reading" oninput="calculate()" placeholder="00.00" value="<?php echo $row['current_reading']  ?>" >
    <span class="error-msg" style="color:red;"></span>
  </div>

  <!-- <div class="col-md-4">
    <label for="rate" class="form-label">Total Reading</label>
    <input required  type="number" step=0.0001  class="form-control" name="total_reading" id="total_reading" >
  </div> -->
  <input required hidden type="number" step=0.0001  class="form-control" name="total_reading" id="total_reading" value="<?php echo $row['total_reading']  ?>" >

  <div class="col-md-4">
    <label for="rate" class="form-label">Total Bill</label>
    <input required readonly type="number" step=0.01  class="form-control" name="total_price" id="total_price" placeholder="00.00" value="<?php echo $row['total']  ?>">
  </div>

  <div class="col-md-4">
    <label for="latest_reading_date" class="form-label">Date of Current Reading</label>
    <input required type="date" class="form-control" name="current_reading_date" id="current_reading_date" value="<?php echo $row['reading_date']?>">
  </div>

  <div class="col-md-4">
    <label for="due_date" class="form-label">Due Date</label>
    <input required type="date" class="form-control" name="due_date" id="due_date" value="<?php echo $row['due_date']?>">
  </div>

  <div class="col-md-4">
    <label for="status" class="form-label">Due Date</label>
    <input readonly required type="text" class="form-control" name="status" id="status" value="<?php echo $row['status']?>">
  </div>

  
  <div class="col-12 buttons">
    <button class="btn btn-primary">Save</button>
    <a href="./" class="btn btn-secondary">Back</a>
  </div>
  <?php }?>
</form>
    </div>
 </body>
 </html>
 <script>

    var select_box_element = document.querySelector('#select_box');

    // $("#current_reading").change(
      
      function calculate() {
      previous_reading = parseFloat(document.getElementById("previous_reading").value);
      current_reading = parseFloat(document.getElementById("current_reading").value);
      total_reading = parseFloat(document.getElementById("total_reading").value);
      total_price = parseFloat(document.getElementById("total_price").value);
      rate = parseFloat(document.getElementById("rate").value);

      if (current_reading <= -0.0001) {
        document.getElementById("current_reading").value = "";
        document.getElementById("total_reading").innerHTML = "";
        document.getElementById("total_price").value = "";
        document.querySelector(".error-msg").innerHTML="Quantity must be greater than 0.";
      } else if (current_reading >= previous_reading) {
              var total_reading = current_reading - previous_reading;
              var total_price = total_reading * rate; 
              document.getElementById("total_reading").value = total_reading;
              document.getElementById("total_price").value = total_price.toFixed(2);
               document.querySelector(".error-msg").innerHTML="";
      }
      else if (current_reading < previous_reading) {
        document.querySelector(".error-msg").innerHTML="Quantity must be greater than Previous Reading.";
      }
    }
    // );

</script>
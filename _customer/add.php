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
<h1>Add <?php if ($page) {echo $page;} ?></h1>
</div>
<div class="content">
<a href="./" class="btn btn-secondary">Back</a>
<form class="row g-3" method="POST" action="create.php">
  <h1>Customer Information</h1>

  <div class="col-md-3">
    <label for="first_name" class="form-label">First Name</label>
    <input required type="text" class="form-control" name="first_name" id="first_name">
  </div>

  <div class="col-md-3">
    <label for="middle_name" class="form-label">Middle Name</label>
    <input required type="text" class="form-control" name="middle_name" id="middle_name">
  </div>

  <div class="col-md-3">
    <label for="last_name" class="form-label">Last Name</label>
    <input required type="text" class="form-control" name="last_name" id="last_name">
  </div>

  <div class="col-md-3">
  <label for="suffix" class="form-label">Suffix</label>
    <input type="text" class="form-control" name="suffix" id="suffix">
  </div>

  <div class="col-md-3">
    <label for="gender" class="form-label">Gender</label>
    <select required id="inputState" class="form-select" name="gender">
      <option value="" select hidden>Choose...</option>
      <option value="Female">Female</option>
      <option value="Male">Male</option>
    </select>
  </div>

  <div class="col-md-3">
    <label for="date_of_birth" class="form-label">Date of Birth</label>
    <input required type="date" class="form-control" name="date_of_birth" id="date_of_birth">
  </div>

  <div class="col-md-3">
    <label for="purok" class="form-label">Purok</label>
    <select required class="form-select" name="purok" id="purok">
      <option value="" select hidden>Choose...</option>
      <option value="Female">test</option>
      <option value="Male">test</option>
    </select>
  </div>

  <div class="col-md-3">
    <label for="place_of_birth" class="form-label">Place of Birth</label>
    <input required type="text" class="form-control" name="place_of_birth" id="place_of_birth">
  </div>

  <div class="col-md-3">
    <label for="civil_status" class="form-label">Civil Status</label>
    <select required class="form-select" name="civil_status" id="civil_status">
      <option value="" select hidden>Choose...</option>
      <option value="Single">Single</option>
      <option value="Married">Married</option>
      <option value="Widowed">Widowed</option>
      <option value="Legally Separated">Legally Separated</option>
    </select>
  </div>

  <div class="col-md-3">
    <label for="phone_number" class="form-label">Phone Number</label>
    <input required type="text" class="form-control" name="phone_number" id="phone_number">
  </div>

  <h1>Billing Information</h1>

  <div class="col-md-3">
    <label for="category" class="form-label">Category</label>
    <select required class="form-select" name="category" id="category">
    <?php
      $squery =  mysqli_query($conn, "SELECT * from category");
      while ($row = mysqli_fetch_array($squery)) { ?>
        <option value="" select hidden>Choose...</option>
        <option value="<?php echo $row['category_name'];  ?>"><?php echo $row['category_name'];  ?></option>
    <?php }?>  
    </select>
  </div>

  <div class="col-md-3">
    <label for="latest_reading_date" class="form-label">Date of First Reading</label>
    <input required type="date" class="form-control" name="latest_reading_date" id="latest_reading_date" value="<?php echo date('Y-m-d'); ?>">
  </div>

  <div class="col-md-3">
    <label for="water_reading" class="form-label">First Water Reading</label>
    <input required type="text" class="form-control" name="water_reading" id="water_reading">
  </div>

  <div class="col-12 buttons" >
    <button type="submit" class="btn btn-primary">Save</button>
  </div>
</form>
    </div>
 </body>
 </html>
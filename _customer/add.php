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
    <label for="first_name" class="form-label">First Name<span style="color: red;">*</span></label>
    <input required type="text" class="form-control" name="first_name" id="first_name">
  </div>

  <div class="col-md-3">
    <label for="middle_name" class="form-label">Middle Name</label>
    <input type="text" class="form-control" name="middle_name" id="middle_name">
  </div>

  <div class="col-md-3">
    <label for="last_name" class="form-label">Last Name<span style="color: red;">*</span></label>
    <input required type="text" class="form-control" name="last_name" id="last_name">
  </div>

  <div class="col-md-3">
  <label for="suffix" class="form-label">Suffix</label>
    <input type="text" class="form-control" name="suffix" id="suffix">
  </div>

  <div class="col-md-3">
    <label for="gender" class="form-label">Gender<span style="color: red;">*</span></label>
    <select required id="inputState" class="form-select" name="gender">
      <option value="" select hidden>Choose...</option>
      <option value="Female">Female</option>
      <option value="Male">Male</option>
    </select>
  </div>

  <div class="col-md-3">
    <label for="date_of_birth" class="form-label">Date of Birth<span style="color: red;">*</span></label>
    <input required type="date" class="form-control" name="date_of_birth" max="<?php echo date('Y-m-d'); ?>" id="date_of_birth">
  </div>

  <div class="col-md-3">
    <label for="purok" class="form-label">Purok<span style="color: red;">*</span></label>
    <select required class="form-select" name="purok" id="purok">
      <option value="" select hidden>Choose...</option>
      <option value="Purok Sambag">Purok Sambag</option>
      <option value="Purok Talisay">Purok Talisay</option>
      <option value="Purok Mabuhay">Purok Mabuhay</option>
      <option value="Purok Macao">Purok Macao</option>
      <option value="Purok Sangguyan">Purok Sangguyan</option>
      <option value="Purok Tagaytay">Purok Tagaytay</option>
      <option value="Purok Saligan">Purok Saligan</option>
      <option value="Purok Tapcan">Purok Tapcan</option>
      <option value="Sitio Pananim">Sitio Pananim</option>
      <option value="Sitio Ambang">Sitio Ambang</option>
      <option value="Sitio Malinis">Sitio Malinis</option>
      <option value="Sitio Balitangan">Sitio Balitangan</option>
      <option value="Sitio Lamlinol">Sitio Lamlinol</option>
      <option value="Purok Abcalag">Purok Abcalag</option>
      <option value="Sitio Kablala">Sitio Kablala</option>
      <option value="Purok Sufa Mlanub">Purok Sufa Mlanub</option>
      <option value="Sitio Lamlangil">Sitio Lamlangil</option>
      <option value="Sitio Kalbangan">Sitio Kalbangan</option>
      <option value="Sitio Nian">Sitio Nian</option>
      <option value="Purok Lumagok">Purok Lumagok</option>
      <option value="Sitio Kadengen">Sitio Kadengen</option>
      <option value="Purok Tinago">Purok Tinago</option>
      <option value="Purok Binenli">Purok Binenli</option>
      <option value="Sitio Pikong">Sitio Pikong</option>
      <option value="Purok Mahayag">Purok Mahayag</option>
      <option value="Purok Mati">Purok Mati</option>
      <option value="Sitio Kanyugan">Sitio Kanyugan</option>
      <option value="Purok Kidalgan">Purok Kidalgan</option>
      <option value="Purok Kiturok">Purok Kiturok</option>
      <option value="Sitio Lambugad">Sitio Lambugad</option>
    </select>
  </div>

  <div class="col-md-3">
    <label for="place_of_birth" class="form-label">Place of Birth<span style="color: red;">*</span></label>
    <input required type="text" class="form-control" name="place_of_birth" id="place_of_birth">
  </div>

  <div class="col-md-3">
    <label for="civil_status" class="form-label">Civil Status<span style="color: red;">*</span></label>
    <select required class="form-select" name="civil_status" id="civil_status">
      <option value="" select hidden>Choose...</option>
      <option value="Single">Single</option>
      <option value="Married">Married</option>
      <option value="Widowed">Widowed</option>
      <option value="Legally Separated">Legally Separated</option>
    </select>
  </div>

  <div class="col-md-3">
    <label for="phone_number" class="form-label">Phone Number<span style="color: red;">*</span></label>
    <input required type="text" class="form-control" name="phone_number" id="phone_number">
  </div>

  <h1>Billing Information</h1>

  <div class="col-md-3">
    <label for="category" class="form-label">Category<span style="color: red;">*</span></label>
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
    <label for="latest_reading_date" class="form-label">Date of First Reading<span style="color: red;">*</span></label>
    <input required type="date" class="form-control" name="latest_reading_date" id="latest_reading_date"  value="<?php echo date('Y-m-d'); ?>">
  </div>

  <div class="col-md-3">
    <label for="water_reading" class="form-label">First Water Reading<span style="color: red;">*</span></label>
    <input required type="text" class="form-control" name="water_reading" id="water_reading">
  </div>

  <div class="col-12 buttons" >
    <button type="submit" class="btn btn-primary">Save</button>
  </div>
</form>
    </div>
 </body>
 </html>
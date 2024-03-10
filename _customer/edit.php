<?php 
$page = 'Customer';
if(isset($_GET['message'])){
    $message = $_GET['message'];
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
include_once "../sidebar.php";
include_once "../db_conn.php";
$id = $_GET['id'];
$squery =  mysqli_query($conn, "SELECT * from customer where id = $id");
 while ($row = mysqli_fetch_array($squery)) {
?>
 <div class="header">
<h1> <?php if ($page) {echo $page;} ?></h1>
</div>
<div class="content">
<a href="./" class="btn btn-secondary">Back</a>
<form class="row g-3" method="POST" action="update.php?id=<?php echo $row['id'] ?>">
  <h1>Customer Information</h1>

  <div class="col-md-3">
    <label for="first_name" class="form-label">First Name</label>
    <input required type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $row['first_name'] ?>">
  </div>

  <div class="col-md-3">
    <label for="middle_name" class="form-label">Middle Name</label>
    <input required type="text" class="form-control" name="middle_name" id="middle_name" value="<?php echo $row['middle_name'] ?>">
  </div>

  <div class="col-md-3">
    <label for="last_name" class="form-label">Last Name</label>
    <input required type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $row['last_name'] ?>">
  </div>

  <div class="col-md-3">
  <label for="suffix" class="form-label">Suffix</label>
    <input type="text" class="form-control" name="suffix" id="suffix" value="<?php echo $row['suffix'] ?>">
  </div>

  <div class="col-md-3">
    <label for="gender" class="form-label">Gender</label>
    <select required id="inputState" class="form-select" name="gender">
      <option value="<?php echo $row['gender'] ?>" select hidden><?php echo $row['gender'] ?></option>
      <option value="Female">Female</option>
      <option value="Male">Male</option>
    </select>
  </div>

  <div class="col-md-3">
    <label for="date_of_birth" class="form-label">Date of Birth</label>
    <input required type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="<?php echo $row['date_of_birth'] ?>">
  </div>

  <div class="col-md-3">
    <label for="purok" class="form-label">Purok</label>
    <select required class="form-select" name="purok" id="purok">
      <option value="<?php echo $row['purok'] ?>" select hidden><?php echo $row['purok'] ?></option>
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
    <label for="place_of_birth" class="form-label">Place of Birth</label>
    <input required type="text" class="form-control" name="place_of_birth" id="place_of_birth"  value="<?php echo $row['place_of_birth'] ?>">
  </div>

  <div class="col-md-3">
    <label for="civil_status" class="form-label">Civil Status</label>
    <select required class="form-select" name="civil_status" id="civil_status">
      <option value="<?php echo $row['civil_status'] ?>" select hidden><?php echo $row['civil_status'] ?></option>
      <option value="Single">Single</option>
      <option value="Married">Married</option>
      <option value="Widowed">Widowed</option>
      <option value="Legally Separated">Legally Separated</option>
    </select>
  </div>

  <div class="col-md-3">
    <label for="phone_number" class="form-label">Phone Number</label>
    <input required type="text" class="form-control" name="phone_number" id="phone_number" value="<?php echo $row['phone_number'] ?>">
  </div>

  <h1>Billing Information</h1>

  <div class="col-md-3">
    <label for="category" class="form-label">Category</label>
    <select required class="form-select" name="category" id="category">
    <option value="<?php echo $row['category'] ?>" select hidden><?php echo $row['category'] ?></option>
    <?php
      $squery2 =  mysqli_query($conn, "SELECT * from category");
      while ($row2 = mysqli_fetch_array($squery2)) { ?>
        <option value="<?php echo $row2['category_name'];  ?>"><?php echo $row2['category_name'];  ?></option>
    <?php }?>  
    </select>
  </div>

  <div class="col-md-3">
    <label for="latest_reading_date" class="form-label">Date of Latest Reading</label>
    <input required type="date" class="form-control" name="latest_reading_date" id="latest_reading_date" value="<?php echo $row['latest_reading_date']; ?>">
  </div>

  <div class="col-md-3">
    <label for="water_reading" class="form-label">Current Water Reading</label>
    <input required type="text" class="form-control" name="water_reading" id="water_reading" value="<?php echo $row['water_reading'] ?>">
  </div>

  <div class="col-12 buttons">
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="./delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
  </div>
</form>
    </div>
    <?php } ?>
 </body>
 </html>

<?php 
$page = 'Category';
if(isset($_GET['message'])){
    $message = $_GET['message'];
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
include_once "../sidebar.php";
include_once "../db_conn.php";
$id = $_GET['id'];
$squery =  mysqli_query($conn, "SELECT * from category Where id = '$id'");
while ($row = mysqli_fetch_array($squery)) {
 ?>
 <div class="header">
<h1>View/Edit <?php if ($page) {echo $page;} ?></h1>
</div>
<div class="content">
<a href="./" class="btn btn-secondary">Back</a>
<form class="row g-3" method="POST" action="update.php?id=<?php echo $row['id']; ?>">
  <h1>Category Information</h1>

  <div class="col-md-6">
    <label for="category" class="form-label">Category</label>
    <input required type="text" class="form-control" name="category" id="category" placeholder="Category" value="<?php echo $row['category_name']; ?>">
  </div>

  <div class="col-md-6">
    <label for="rate" class="form-label">Rate</label>
    <input required type="text" class="form-control" name="rate" id="rate" placeholder="00.00" value="<?php echo $row['rate']; ?>">
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
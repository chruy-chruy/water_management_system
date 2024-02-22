<?php 
$page = 'Billing';
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
  <h1>Billing Information</h1>

  <div class="col-md-6">
    <label for="exampleDataList" class="form-label">Customer</label>
    <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search customer..." name="customer_id">
    <datalist id="datalistOptions">
    <?php
        $squery =  mysqli_query($conn, "SELECT * from customer where del_status != 'deleted'");
         while ($row = mysqli_fetch_array($squery)) {
        ?>
      <option value="<?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name']." ".$row['suffix'] ?>">
    <?php }?>
    </datalist>
  </div>

  <div class="col-md-6">
    <label for="rate" class="form-label">Rate</label>
    <input required type="text" class="form-control" name="rate" id="rate" placeholder="00.00">
  </div>

  
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Save</button>
  </div>
</form>
    </div>
 </body>
 </html>
 <script>

    var select_box_element = document.querySelector('#select_box');

    dselect(select_box_element, {
        search: true
    });

</script>
<?php 
$page = 'User';
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
  <h1>User Information</h1>

  <div class="col-md-4">
    <label for="username" class="form-label">User Nane</label>
    <input required type="text" class="form-control" name="username" id="username" placeholder="username">
  </div>

  <div class="col-md-4">
    <label for="password" class="form-label">Password</label>
    <input required type="text" class="form-control" name="password" id="password" placeholder="password">
  </div>
  <div class="col-md-4">
    <label for="role" class="form-label">Role</label>
    <select required type="text" class="form-select" name="role" id="role">
    <option value="" select hidden>Choose role...</option>
      <option value="Administrator">Administrator</option>
      <option value="Staff">Staff</option>
    </select>
  </div>

  <div class="col-12 buttons">
    <button type="submit" class="btn btn-primary">Save</button>
  </div>
</form>
    </div>
 </body>
 </html>
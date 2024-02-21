<!DOCTYPE html>
<html>
  <head>
    <title>Babysitter Application Form</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/sidebar.css">
  </head>
  <body>
  <?php 
$page = 'Certificate';
include_once "../sidebar.php";
include_once "../db_conn.php";
 ?>
    <div class="content">
      <form action="/">
        <div class="banner">
          <h1>Application Form</h1>
        </div>
        <br>
        <div class="item">
          <p>Personal Information</p>
          <br>
          <div class="name-item">
            <label for="">First Name</label>
            <br>
            <input type="text" name="First" required/>
            <br>
            <input type="text" name="Last" placeholder="Last" />
            <input type="date" name="bdate" required/>
          </div>
        </div>
        <div class="btn-block">
          <button type="submit" href="/">Apply</button>
        </div>
      </form>
    </div>
  </body>
</html>
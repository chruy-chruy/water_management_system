<!DOCTYPE html>
<html lang="en">

<head>

    <title>WATER MANAGEMENT SYSTEM</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./assets/css/login.css">


</head>

<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <form class="login" method="POST"  action="login.php" >
        <img src="./assets/img/logo.png" alt="Logo" class="login-logo">
        <h3>WATER MANAGEMENT SYSTEM</h3>

        <label for="username"> <i class="login__icon fas fa-user"></i> Username</label>
        <input type="text" placeholder="Username" id="username" name="username">

        <label for="password"> <i class="login__icon fas fa-lock"></i> Password</label>
        <input type="password" placeholder="Password" id="password" name="password">
        <?php if (isset($_GET['error'])) { ?>
                <p class="error-message" style="margin-bottom: 15px; color :red ;"><?php echo $_GET['error']; ?></p>
            <?php } ?>
        <button type="submit" class="button login__submit">
            <span class="button__text">LOGIN</span>
        </button>
    </form>
</body>

</html>
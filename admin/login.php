<?php require_once("../config.php");  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <div class="container">
  <form action="" class="form-login" method="post">
  <h2 class="form-login-heading">Admin Login</h2>
  <input type="text" name="admin_email" class="form-control" placeholder="Admin Email" required>
  <input type="password" name="admin_pass" class="form-control" placeholder="Admin Password" required>
  <button type="submit" name="admin_login" class="btn btn-primary btn-lg btn-block">Log In</button>
  </form>
  </div>  
</body>
</html>


<?php
if(isset($_POST['admin_login'])) {

    $admin_email = escape_string($_POST['admin_email']);
    $admin_pass = escape_string($_POST['admin_pass']);

    $query_admin = query("SELECT * FROM admin WHERE admin_email='$admin_email' AND admin_pass='$admin_pass'");
    confirm($query_admin);

    $count = mysqli_num_rows($query_admin);

    if($count == 1) {

        $_SESSION['admin_email'] = $admin_email;

        echo "<script>alert('You are Loged In successfully')</script>";
        echo "<script>window.open('index.php?dashboard','_self')</script>";

    }
    else {

        echo "<script>alert('Your Email or Password are wrong')</script>";
    }
}



?>

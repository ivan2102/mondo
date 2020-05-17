<?php require_once("../config.php"); ?>


<?php 

if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

}else {



?>

<?php 

if(isset($_GET['edit_profile'])) {

    $admin_id = $_GET['edit_profile'];

    $query_select_admin = query("SELECT * FROM admin WHERE admin_id='$admin_id'");
    confirm($query_select_admin);
    $row = fetch_array($query_select_admin);

    $admin_id = $row['admin_id'];
    $admin_name = $row['admin_name'];
    $admin_email = $row['admin_email'];
    $admin_pass = $row['admin_pass'];
    $admin_country = $row['admin_country'];
    $admin_contact = $row['admin_contact'];
    $admin_image = $row['admin_image'];
    $admin_job = $row['admin_job'];
    $admin_about = $row['admin_about'];
}




?>

<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
<li class="active">
<i class="fa fa-tachometer-alt"></i> Dashboard / Edit Profile
</li>
</ol>
</div>
</div>

<div class="row">
<div class="col-lg-12">
<div class="panel panel-info">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-money"></i> Edit Profile
</h3>
</div><!--panel-heading Ends -->
</div>
</div>
</div>

<div class="panel-body">
<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label  class="col-lg-3 control-label">User Name: </label>
<div class="col-lg-6">
<input type="text" name="admin_name" value="<?php echo $admin_name; ?>" class="form-control" required>
</div>
</div>

<div class="form-group">
<label class="col-lg-3 control-label">User Email: </label>
<div class="col-lg-6">
<input type="email" name="admin_email" value="<?php echo $admin_email; ?>" class="form-control" required>
</div>
</div>

<div class="form-group">
<label  class="col-lg-3 control-label">User Password: </label>
<div class="col-lg-6">
<input type="password" name="admin_password" value="<?php echo $admin_pass; ?>" class="form-control">
</div>
</div>

<div class="form-group">
<label  class="col-lg-3 control-label">User Country: </label>
<div class="col-lg-6">
<input type="text" name="admin_country" value="<?php echo $admin_country; ?>" class="form-control" required>
</div>
</div>

<div class="form-group">
<label  class="col-lg-3 control-label">User Contact: </label>
<div class="col-lg-6">
<input type="text" name="admin_contact" value="<?php echo $admin_contact; ?>" class="form-control" required>
</div>
</div>

<div class="form-group">
<label  class="col-lg-3 control-label">User Image: </label>
<div class="col-lg-6">
<input type="file" name="admin_image" class="form-control"><br>
<img src="img/admin-images/<?php echo $admin_image ?>" class="img-responsive" alt="">
</div>
</div>

<div class="form-group">
<label  class="col-lg-3 control-label">User Job: </label>
<div class="col-lg-6">
<input type="text" name="admin_job" value="<?php echo $admin_job; ?>" class="form-control" required>
</div>
</div>

<div class="form-group">
<label  class="col-lg-3 control-label">User About: </label>
<div class="col-lg-6">
<input type="text" name="admin_about" value="<?php echo $admin_about; ?>" class="form-control" required>
</div>
</div>

<div class="text-center">
<label class="col-lg-3 control-label"></label>
<div class="col-lg-6">
<input type="submit" name="update_profile" value="Update Profile" class="btn btn-primary form-control">
</div>
</div>
</form>
</div>

<?php 

if(isset($_POST['update_profile'])) {

    $admin_name = escape_string($_POST['admin_name']);
    $admin_email = escape_string($_POST['admin_email']);
    $admin_pass = escape_string($_POST['admin_pass']);
    $admin_country = escape_string($_POST['admin_country']);
    $admin_contact = escape_string($_POST['admin_contact']);
    $admin_image = escape_string($_FILES['admin_image']['name']);
    $temp_image = escape_string($_FILES['admin_image']['tmp_name']);
    $admin_job = escape_string($_POST['admin_job']);
    $admin_about = escape_string($_POST['admin_about']);

    move_uploaded_file($temp_image,"img/admin-images/$admin_image");

    $query_update_admin = query("UPDATE admin SET admin_name='{$admin_name}',admin_email='{$admin_email}',admin_pass='$admin_pass',
    admin_country='{$admin_country}',admin_contact='{$admin_contact}',admin_image='{$admin_image}',admin_job='{$admin_job}',admin_about='{$admin_about}'
    WHERE admin_id='{$admin_id}'");
    confirm($query_update_admin);

    if($query_update_admin) {

        echo "<script>alert('Your Profile has been updated successfully')</script>";
        echo "<script>window.open('index.php?view_users','_self')</script>";
    }
}


?>

<?php } ?>
<?php require_once("../config.php"); ?>

<?php

if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

}else {


?>

<?php 

$query_contact = query("SELECT * FROM contact");
confirm($query_contact);
$row = fetch_array($query_contact);
$contact_email = $row['contact_email'];
$contact_heading = $row['contact_heading'];
$contact_desc = $row['contact_desc'];


?>

<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
<li class="active">
<i class="fa fa-tachometer-alt"></i> Dashboard / Edit Contact
</li>
</ol>
</div>
</div>

<div class="row">
<div class="col-lg-12">
<div class="panel panel-info">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-money"></i> Edit Contact
</h3>
</div><!--panel-heading Ends -->

<div class="panel-body">
<form action="" method="post" class="form-horizontal">
<div class="form-group">
<label class="col-md-3 control-label">Contact Email: </label>
<div class="col-md-6">
<input type="text" name="contact_email" value="<?php echo $contact_email; ?>" class="form-control" required>
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label">Contact Heading: </label>
<div class="col-md-6">
<input type="text" name="contact_heading" value="<?php echo $contact_heading; ?>" class="form-control">
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label">Contact Description: </label>
<div class="col-md-6">
<textarea name="contact_desc" class="form-control" cols="20" rows="6"><?php echo $contact_desc; ?></textarea>
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label"></label>
<div class="col-md-6">
<input type="submit" name="update_contact" class="btn btn-primary form-control" value="Update Contact">
</div>
</div>
</form>
</div>
</div>
</div>
</div>

<?php 

if(isset($_POST['update_contact'])) {

    $contact_email = escape_string($_POST['contact_email']);
    $contact_heading = escape_string($_POST['contact_heading']);
    $contact_desc = escape_string($_POST['contact_desc']);

    $query_update_contact = query("UPDATE contact SET contact_email='{$contact_email}',contact_heading='{$contact_heading}',contact_desc='$contact_desc'");
    confirm($query_update_contact);

    if($query_update_contact) {

        echo "<script>alert('Your Contact has been updated successfully')</script>";
        echo "<script>window.open('index.php?dashboard','_self')</script>";
    }
}



?>

<?php } ?>
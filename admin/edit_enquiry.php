<?php require_once("../config.php"); ?>

<?php 

if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

}else {




?>

<?php 

if(isset($_GET['edit_enquiry'])) {

    $enquiry_id = $_GET['edit_enquiry'];

    $query_select_enquiry = query("SELECT * FROM enquiry_types WHERE enquiry_id='$enquiry_id'");
    confirm($query_select_enquiry);
    $row = fetch_array($query_select_enquiry);
    $enquiry_title = $row['enquiry_title'];
}



?>

<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
<li class="active">
<i class="fa fa-tachometer-alt"></i> Dashboard / Edit Enquiry
</li>
</ol>
</div>
</div>

<div class="row">
<div class="col-lg-12">
<div class="panel panel-info">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-money"></i> Edit Enquiry
</h3>
</div><!--panel-heading Ends -->

<div class="panel-body">
<form action="" method="post" class="form-horizontal">
<div class="form-group">
<label class="col-md-3 control-label">Enquiry Title: </label>
<div class="col-md-6">
<input type="text" name="enquiry_title" value="<?php echo $enquiry_title; ?>" class="form-control">
</div>
</div>

<div class="form-group">
<label  class="col-md-3 control-label"></label>
<div class="col-md-6">
<input type="submit" name="update_enquiry" class="btn btn-primary form-control" value="Update Enquiry">
</div>
</div>
</form>
</div>
</div>
</div>
</div>

<?php 

if(isset($_POST['update_enquiry'])) {

    $enquiry_title = escape_string($_POST['enquiry_title']);

    $query_update_enquiry = query("UPDATE enquiry_types SET enquiry_title='{$enquiry_title}'
    WHERE enquiry_id='{$enquiry_id}'");
    confirm($query_update_enquiry);

    if($query_update_enquiry) {

        echo "<script>alert('Your Enquiry updated successfully')</script>";
        echo "<script>window.open('index.php?view_enquiry','_self')</script>";
    }
}



?>


<?php } ?>
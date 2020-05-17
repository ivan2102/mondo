<?php require_once("../config.php"); ?>

<?php 

if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

}else {



?>

<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
<li class="active">
<i class="fa fa-tachometer-alt"></i> Dashboard / Add Enquiry
</li>
</ol>
</div>
</div>

<div class="row">
<div class="col-lg-12">
<div class="panel panel-info">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-money"></i> Add Enquiry
</h3>
</div><!--panel-heading Ends -->

<div class="panel-body">
<form action="" method="post" class="form-horizontal">
<div class="form-group">
<label class="div col-md-3 control-label">Enquiry Title: </label>
<div class="col-md-6">
<input type="text" name="enquiry_title" class="form-control">
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label"></label>
<div class="col-md-6">
<input type="submit" name="add_enquiry" class="btn btn-primary form-control" value="Add Enquiry">
</div>
</div>
</form>
</div>
</div>
</div>
</div>

<?php 

if(isset($_POST['add_enquiry'])) {

    $enquiry_title = escape_string($_POST['enquiry_title']);

    $query_insert_enquiry = query("INSERT INTO enquiry_types (enquiry_title) VALUES('{$enquiry_title}')");
    confirm($query_insert_enquiry);

    if($query_insert_enquiry) {

        echo "<script>alert('Your Enquiry added successfully')</script>";
        echo "<script>window.open('index.php?view_enquiry','_self')</script>";
    }
}


?>

<?php } ?>
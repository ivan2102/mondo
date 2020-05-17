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
<i class="fa fa-tachometer-alt"></i> Dashboard / Add Slide
</li>
</ol>
</div>
</div>

<div class="row">
<div class="col-lg-12">
<div class="panel panel-info">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-money"></i> Add Slide
</h3>
</div><!--panel-heading Ends -->

<div class="panel-body">
<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label  class="col-lg-3 control-label">Slide Title: </label>
<div class="col-lg-6">
<input type="text" name="slide_title" class="form-control" required>
</div>
</div>

<div class="form-group">
<label  class="col-lg-3 control-label">Slide Image: </label>
<div class="col-lg-6">
<input type="file" name="slide_image" class="form-control" >
</div>
</div>

<div class="text-center">
<label class="col-lg-3 control-label"></label>
<div class="col-lg-6">
<input type="submit" name="add_slider" value="Add Slider" class="btn btn-primary form-control">
</div>
</div>
</form>
</div>
</div>
</div>
</div>

<?php

if(isset($_POST['add_slider'])) {

    $slide_title = escape_string($_POST['slide_title']);
    $slide_image = escape_string($_FILES['slide_image']['name']);
    $temp_image = escape_string($_FILES['slide_image']['tmp_name']);

    move_uploaded_file($temp_image,"img/$slide_image");

    $query_insert_slide = query("INSERT INTO slides (slide_title,slide_image) VALUES('{$slide_title}','{$slide_image}')");
    confirm($query_insert_slide);

    if($query_insert_slide) {

        echo "<script>alert('Slider inserted successfully')</script>";
        echo "<script>window.open('index.php?view_slides','_self')</script>";
    }
}


?>

<?php } ?>
<?php require_once("../config.php"); ?>

<?php

if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

}else {


?>

<?php 

if(isset($_GET['edit_slide'])) {

    $slide_id = $_GET['edit_slide'];

    $query_select_slides = query("SELECT * FROM slides WHERE slide_id='$slide_id'");
    confirm($query_select_slides);
    $row = fetch_array($query_select_slides);
    $slide_id = $row['slide_id'];
    $slide_title = $row['slide_title'];
    $slide_image = $row['slide_image'];
}

?>

<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
<li class="active">
<i class="fa fa-tachometer-alt"></i> Dashboard / Edit Slide
</li>
</ol>
</div>
</div>

<div class="row">
<div class="col-lg-12">
<div class="panel panel-info">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-money"></i> Edit Slide
</h3>
</div><!--panel-heading Ends -->

<div class="panel-body">
<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label  class="col-lg-3 control-label">Slide Title: </label>
<div class="col-lg-6">
<input type="text" name="slide_title" value=<?php echo $slide_title; ?> class="form-control" required>
</div>
</div>

<div class="form-group">
<label  class="col-lg-3 control-label">Slide Image: </label>
<div class="col-lg-6">
<input type="file" name="slide_image" class="form-control" required><br>
<img src="img/<?php echo $slide_image; ?>" class="img-responsive" alt="">
</div>
</div>

<div class="text-center">
<label class="col-lg-3 control-label"></label>
<div class="col-lg-6">
<input type="submit" name="update_slide" value="Update Slide" class="btn btn-primary form-control">
</div>
</div>
</form>
</div>
</div>
</div>
</div>

<?php

if(isset($_POST['update_slide'])) {

    $slide_title = escape_string($_POST['slide_title']);
    $slide_image = escape_string($_FILES['slide_image']['name']);
    $temp_name = escape_string($_FILES['slide_image']['tmp_name']);

    move_uploaded_file($temp_name,"img/$slide_image");

    $query_update_slides = query("UPDATE slides SET slide_title='{$slide_title}',slide_image='{$slide_image}'
    WHERE slide_id='{$slide_id}'");
    confirm($query_update_slides);

    if($query_update_slides) {

        echo "<script>alert('One Slide has been updated successfully')</script>";
        echo "<script>window.open('index.php?view_slides','_self')</script>";
    }
}





?>

<?php } ?>
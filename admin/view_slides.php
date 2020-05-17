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
<i class="fa fa-tachometer-alt"></i> Dashboard / View Slides
</li>
</ol>
</div>
</div>

<div class="row">
<div class="col-lg-12">
<div class="panel panel-info">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-money"></i> View Slides
</h3>
</div><!--panel-heading Ends -->

<div class="panel-body">
<?php

$query_slider = query("SELECT * FROM slides");
confirm($query_slider);
while($row = fetch_array($query_slider)) {
    $slide_id = $row['slide_id'];
    $slide_title = $row['slide_title'];
    $slide_image = $row['slide_image'];
?>

<div class="col-lg-3 col-md-3">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title" align="center">
<?php echo $slide_title; ?>
</h3>
</div><!-- panel-heading Ends -->

<div class="panel-body">
<img src="img/<?php echo $slide_image; ?>" class="img-responsive" alt="">
</div><!--panel-body Ends -->

<div class="panel-footer">
<center>

<a href="index.php?edit_slide=<?php echo $slide_id; ?>" class="btn btn-info btn-md pull-left">
<i class="fa fa-pencil-alt"></i>
</a>

<a href="index.php?delete_slide=<?php echo $slide_id; ?>" class="btn btn-danger btn-md pull-right">
<i class="fa fa-trash"></i>
</a>

<div class="clearfix"></div>
</center>
</div>
</div>
</div>

<?php } ?>
</div>
</div>
</div>
</div>

<?php } ?>
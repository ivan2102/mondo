<?php require_once("../config.php"); ?>


<?php 

if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

}else {


?>

<?php 
if(isset($_GET['edit_category'])) {

    $category_id = $_GET['edit_category'];

    $query_categories = query("SELECT * FROM categories WHERE category_id ='$category_id'");
    confirm($query_categories);
    $row = fetch_array($query_categories);
    $category_id = $row['category_id'];
    $category_title = $row['category_title'];
}

?>

<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
<li class="active">
<i class="fa fa-tachometer-alt"></i> Dashboard / Edit Category
</li>
</ol>
</div>
</div>

<div class="row">
<div class="col-lg-12">
<div class="panel panel-info">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-money"></i> Edit Category
</h3>
</div><!--panel-heading Ends -->

<div class="panel-body">
<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-lg-3 control-label">Category Title: </label>
<div class="col-lg-6">
<input type="text" name="category_title" value="<?php echo $category_title; ?>" class="form-control" required>
</div>
</div>

<div class="text-center">
<label class="col-lg-3 control-label"></label>
<div class="col-lg-6">
<input type="submit" name="update_category" class="btn btn-primary form-control" value="Update Category">
</div>
</div>
</form>
</div>
</div>
</div>
</div>

<?php 

if(isset($_POST['update_category'])) {

    $category_title = escape_string($_POST['category_title']);

    $query_update_category = query("UPDATE categories SET category_title='{$category_title}'");
    confirm($query_update_category);

    if($query_update_category) {

        echo "<script>alert('Your Category updated successfully')</script>";
        echo "<script>window.open('index.php?view_categories','_self')</script>";
    }
}

?>


<?php } ?>
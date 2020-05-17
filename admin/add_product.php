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
<i class="fa fa-tachometer-alt"></i> Dashboard / Add Product
</li>
</ol>
</div>
</div>

<div class="row">
<div class="col-lg-12">
<div class="panel panel-info">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-money"></i> Add Product
</h3>
</div><!--panel-heading Ends -->

<div class="panel-body">
<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label for="" class="col-lg-3 control-label">Product Title: </label>
<div class="col-lg-6">
<input type="text" name="product_title" class="form-control" required>
</div>
</div>

<div class="form-group" ><!-- form-group Starts -->

<label class="col-lg-3 control-label" > Category </label>
<div class="col-md-6">
<select name="category" class="form-control" >

<option> Select a Category </option>

<?php 

$query = query("SELECT * FROM categories");
confirm($query);

while($row = fetch_array($query)) {

    $category_id = $row['category_id'];
    $category_title = $row['category_title'];

    echo "<option value='$category_id'>{$category_title}</option>";
}

?>


</select>
</div>
</div><!-- form-group Ends -->

<div class="form-group">
<label for="" class="col-lg-3 control-label">Product Price: </label>
<div class="col-lg-6">
<input type="text" name="product_price" class="form-control" required>
</div>
</div>

<div class="form-group">
<label for="" class="col-lg-3 control-label">Product Image: </label>
<div class="col-lg-6">
<input type="file" name="product_image" class="form-control" required>
</div>
</div>

<div class="text-center">
<label for="" class="col-lg-3 control-label"></label>
<div class="col-lg-6">
<input type="submit" name="add_product" value="Add Product" class="btn btn-primary form-control">
</div>
</div>
</form>
</div>
</div>
</div>
</div>

<?php
if(isset($_POST['add_product'])) {

    
    $product_title = escape_string($_POST['product_title']);
    $product_price = escape_string($_POST['product_price']);
    $category = escape_string($_POST['category']);
    $product_image = escape_string($_FILES['product_image']['name']);
    $temp_image = escape_string($_FILES['product_image']['tmp_name']);

    move_uploaded_file($temp_image,"img/product/$product_image");

    $query_insert_product = query("INSERT INTO products (product_title,product_price,category_id,category,product_image)
    VALUES('{$product_title}','{$product_price}','{$category_id}','{$category}','{$product_image}')");
    confirm($query_insert_product);

    if($query_insert_product) {

        echo "<script>alert('Product added successfully')</script>";
        echo "<script>window.open('index.php?view_products','_self')</script>";
    }
}


?>


<?php } ?>
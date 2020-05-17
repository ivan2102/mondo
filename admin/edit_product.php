<?php require_once("../config.php"); ?>

<?php 

if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
}else {


?>

<?php 

if(isset($_GET['edit_product'])) {

    $product_id = $_GET['edit_product'];

    $query_products = query("SELECT * FROM products WHERE product_id='$product_id'");
    confirm($query_products);
    $row = fetch_array($query_products);
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_price = $row['product_price'];
    $product_image = $row['product_image'];
}

?>

<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
<li>
<i class="fa fa-tachometer-alt"></i> View Products /Edit Product
</li>
</ol>
</div>
</div>

<div class="row">
<div class="col-lg-12">
<div class="panel panel-info">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-money"></i> Edit Product
</h3>
</div><!--panel-heading Ends -->

<div class="panel-body">
<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label for="" class="col-lg-3 control-label">Product Title: </label>
<div class="col-lg-6">
<input type="text" name="product_title" value="<?php echo $product_title; ?>" class="form-control" required>
</div>
</div>
<div class="form-group">
<label for="" class="col-lg-3 control-label">Product Price: </label>
<div class="col-lg-6">
<input type="text" name="product_price" value="<?php echo $product_price; ?>" class="form-control" required>
</div>
</div>

<div class="form-group">
<label for="" class="col-lg-3 control-label">Product Image: </label>
<div class="col-lg-6">
<input type="file" name="product_image" class="form-control" required><br>
<img src="img/product/<?php echo $product_image; ?>" alt="">
</div>
</div>

<div class="text-center">
<label for="" class="col-lg-3 control-label"> </label>
<div class="col-lg-6">
<input type="submit" name="update_product" value="Update Product" class="btn btn-primary form-control" required>
</div>
</div>
</form>
</div>
</div>
</div>
</div>

<?php 

if(isset($_POST['update_product'])) {

    $product_title = escape_string($_POST['product_title']);
    $product_price = escape_string($_POST['product_price']);
    $product_image = escape_string($_FILES['product_image']['name']);
    $temp_name = escape_string($_FILES['product_image']['tmp_name']);

    move_uploaded_file($temp_name,"img/product/$product_image");

    $query_update_products = query("UPDATE products SET product_title='{$product_title}',product_price='{$product_price}',
    product_image='{$product_image}' WHERE product_id='{$product_id}'");
    confirm($query_update_products);

    if($query_update_products) {

        echo "<script>alert('Product updated successfully')</script>";
        echo "<script>window.open('index.php?view_products','_self')</script>";
    }
}


?>

<?php } ?>
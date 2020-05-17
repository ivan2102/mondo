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
<i class="fa fa-tachometer-alt"></i> Dashboard / View Categories
</li>
</ol>
</div>
</div>

<div class="row">
<div class="col-lg-12">
<div class="panel panel-info">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-money"></i> View Categories
</h3>
</div><!--panel-heading Ends -->

<div class="panel-body">
<div class="table-responsive">
<table class="table table-bordered table-hover table-striped">
<thead>
<tr>
<th>Category ID</th>
<th>Category Title</th>
<th>Edit Category</th>
<th>Delete Category</th>
</tr>
</thead>

<tbody>
<?php
$i = 0;

$query_categories = query("SELECT * FROM categories");
confirm($query_categories);
while($row = fetch_array($query_categories)) {

    $category_id = $row['category_id'];
    $category_title = $row['category_title'];

    $i++;
?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $category_title; ?></td>
<td>
<a href="index.php?edit_category=<?php echo $category_id; ?>" class="btn btn-info btn-md">
<i class="fa fa-pencil-alt"></i>
</a>
</td>
<td>
<a href="index.php?delete_category=<?php echo $category_id; ?>" class="btn btn-danger btn-md">
<i class="fa fa-trash"></i>
</a>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>


<?php } ?>
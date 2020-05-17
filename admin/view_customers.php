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
<i class="fa fa-tachometer-alt"></i> Dashboard /View Customers
</li>
</ol>
</div>
</div>

<div class="row">
<div class="col-lg-12">
<div class="panel panel-info">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-money"></i> View Customers
</h3>
</div><!--panel-heading Ends -->

<div class="panel-body">
<div class="table-responsive">
<table class="table table-bordered table-hover table-striped">
<thead>
<tr>
<th>Customer ID</th>
<th>Customer Name</th>
<th>Customer Email</th>
<th>Customer Password</th>
<th>Address</th>
<th>Country</th>
<th>Zip</th>
<th>Phone</th>
<th>Delete Customer</th>
</tr>
</thead>

<tbody>
<?php 
$i = 0;

$query_customers = query("SELECT * FROM customers");
confirm($query_customers);
while($row = fetch_array($query_customers)) {
    $customer_id = $row['customer_id'];
    $customer_name = $row['customer_name'];
    $customer_email = $row['customer_email'];
    $customer_password = $row['customer_password'];
    $address = $row['address'];
    $country = $row['country'];
    $zip = $row['zip'];
    $phone = $row['phone'];

    $i++;
?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $customer_name ?></td>
<td><?php echo $customer_email; ?></td>
<td><?php echo $customer_password; ?></td>
<td><?php echo $address; ?></td>
<td><?php echo $country; ?></td>
<td><?php echo $zip; ?></td>
<td><?php echo $phone; ?></td>
<td>
<a href="index.php?delete_customer=<?php echo $customer_id; ?>" class="btn btn-danger btn-lg">
<i class="fa fa-trash"></i>
</a>
</td>
</tr>
<?php }  ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>


<?php } ?>
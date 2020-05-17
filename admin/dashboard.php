

<?php 

if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

}else {



?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>

        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-tachometer-alt"></i> Dashboard
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                    </div><!--col-xs-3 -->

                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $count_products; ?></div>
                        <div>Products</div>
                    </div>
                </div>
            </div><!--panel-heading Ends -->

            <a href="index.php?view_products">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div><!--col-lg-3 col-md-6 Ends -->

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div><!--col-xs-3 Ends -->

                <div class="col-xs-9 text-right">
                <div class="huge"><?php echo $count_customers; ?></div>
                <div>Customers</div>
                </div>
                </div>
            </div><!--panel-heading Ends -->
            
            <a href="index.php?view_customers">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
                    <div class="clearfix"></div>
                </div>
            </a>
            
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div><!--col-xs-3 Ends -->

                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $count_categories; ?></div>
                        <div>Categories</div>
                    </div>
                </div>
            </div><!--panel-heading Ends -->

            <a href="index.php?view_categories">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"> <i class= "fa fa-arrow-circle-right"></i> </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-support fa-5x"></i>
                    </div><!--col-xs-3 Ends -->

                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $count_orders; ?></div>
                        <div>Orders</div>
                    </div>
                </div>
            </div><!--panel-heading Ends -->

            <a href="index.php?view_orders">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"> <i class= "fa fa-arrow-circle-right"></i> </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div> 
</div><!--2 row Ends -->

<div class="row">
<div class="col-lg-8">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-money fa-fw"></i> New Orders
</h3>
</div><!--panel-heading Ends -->

<div class="panel-body">
<div class="table-responsive">
<table class="cart-table account-table table table-bordered">
<thead>
<tr>
<th>Order ID</th>
<th>Customer Email</th>
<th>Invoice No</th>
<th>Product ID</th>
<th>Product Quantity</th>
<th>Product Size</th>
<th>Order Status</th>
</tr>
</thead>

<tbody>
<?php 
$i = 0;
$query_pending_orders = query("SELECT * FROM pending_orders");
confirm($query_pending_orders);
while($row = fetch_array($query_pending_orders)) {
    $order_id = $row['order_id'];
    $customer_id = $row['customer_id'];
    $invoice_number = $row['invoice_number'];
    $product_id = $row['product_id'];
    $product_quantity = $row['product_quantity'];
    $product_size = $row['product_size'];
    $order_status = $row['order_status'];

    $i++;
?>
<tr>
<td><?php echo $i; ?></td>
<td><?php 
$query_customers = query("SELECT * FROM customers WHERE customer_id='$customer_id'");
confirm($query_customers);
$row = fetch_array($query_customers);
$customer_email = $row['customer_email'];
echo $customer_email;
?></td>
<td><?php echo $invoice_number ?></td>
<td><?php echo $product_id; ?></td>
<td><?php echo $product_quantity; ?></td>
<td><?php echo $product_size; ?></td>
<td><?php 
if($order_status == 'pending') {

    echo $order_status = 'pending';
}
else {

    echo $order_status = 'Complete';
}
?></td>
</tr>
<?php } ?>
</tbody>
</table>
</div><!--table-responsive Ends -->

<div class="text-right">
<a href="index.php?view_orders">
View All Orders <i class="fa fa-arrow-circle-right"></i>
</a>
</div>
</div>
</div>
</div><!--col-lg-8 Ends -->

<div class="col-md-4">
<div class="panel">
<div class="panel-body">
<div class="thumb-info mb-md">
<img src="img/admin-images/<?php echo $admin_image; ?>" class="rounded img-responsive" alt="">
<div class="thumb-info-title">
<span class="thumb-info-inner"><?php echo $admin_name; ?></span>
<span class="thumb-info-type"><?php echo $admin_job; ?></span>
</div>
</div><!--thumb-info mb-md -->

<div class="mb-md">
<div class="widget-content-expanded">
<i class="fa fa-user"></i> <span>Email: </span> <?php echo $admin_email; ?> <br>
<i class="fa fa-user"></i> <span>Country: </span> <?php echo $admin_country; ?> <br>
<i class="fa fa-user"></i> <span>Contact: </span> <?php echo $admin_contact; ?> <br>
</div><!--widget-content-expanded Ends -->

<hr class="dotted-short">
<h5 class="text-muted">About</h5>
<p><?php echo $admin_about; ?></p>
</div>
</div>
</div>
</div>

</div><!--3 row Ends -->


<?php } ?>
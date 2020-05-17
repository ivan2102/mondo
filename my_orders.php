<?php require_once("config.php"); ?>
<?php require_once("includes/header.php"); ?>


<?php 

if(isset($_GET['customer_id'])) {

    $customer_id = $_GET['customer_id'];
 }

    $ip_address = getRealUserIp();  
    $order_status = 'pending';
    $invoice_number = mt_rand();
    

    $query_cart = query("SELECT * FROM cart WHERE ip_address='$ip_address'");
    confirm($query_cart);
    while($row = fetch_array($query_cart)) {
    $product_id = $row['product_id'];
    $product_quantity = $row['product_quantity'];
    $product_size = $row['product_size'];

    $query_products = query("SELECT * FROM products WHERE product_id='$product_id'");
    confirm($query_products);
    while($row = fetch_array($query_products)) {
    $total = $total + $product_quantity * $row['product_price'];

    $query_insert_customer_orders = query("INSERT INTO customer_orders (customer_id,invoice_number,due_amount,product_quantity,product_size,order_date,order_status)
    VALUES('{$customer_id}','{$invoice_number}','{$total}','{$product_quantity}','{$product_size}',NOW(),'{$order_status}')");
    confirm($query_insert_customer_orders);

    $query_insert_pending_orders = query("INSERT INTO pending_orders (customer_id,invoice_number,product_id,product_quantity,product_size,order_status) 
    VALUES('{$customer_id}','{$invoice_number}','{$product_id}','{$product_quantity}','{$product_size}','{$order_status}')");
    confirm($query_insert_pending_orders);

    $query_delete_cart = query("DELETE FROM cart WHERE ip_address='$ip_address'");
    confirm($query_delete_cart);

       // echo "<script>alert('Your Order has been submit successfully')</script>";
        echo "<script>window.open('my_orders.php','_self')</script>";

    }

}





?>

<!-- Page info -->
<div class="page-top-info">
		<div class="container">
            <h4>My Orders</h4>
			<div class="site-pagination">
				<a href="index.php">Home</a> /
				<a href="contact.php">Contact</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->

    <section class="contact-section">
    <div class="container">
    <div class="row">
    <div class="col-lg-12 contact-info">
    <table class="cart-table account-table table table-bordered" align="center">
    <thead class="align-center bg-info">
    <tr>
    <th>Order ID</th>
    <th>Due Amount</th>
    <th>Invoice No</th>
    <th>Product Quantity</th>
    <th>Product Size</th>
    <th>Order Date</th>
    <th>Order Status</th>
    <th>Confirm Payment</th>
    <th>Delete Order</th>
    </tr>
    </thead>

    <tbody>
    <?php 
    $customer_session = $_SESSION['customer_email'];

    $query_customers = query("SELECT * FROM customers WHERE customer_email='$customer_session'");
    confirm($query_customers);
    $row = fetch_array($query_customers);
    $customer_id = $row['customer_id'];
    

    
    $query_customer_orders = query("SELECT * FROM customer_orders WHERE customer_id='$customer_id'");
    confirm($query_customer_orders);

    $i = 0;
    while($row = fetch_array($query_customer_orders)) {
        $order_id = $row['order_id'];
        $customer_id = $row['customer_id'];
        $invoice_number = $row['invoice_number'];
        $due_amount = $row['due_amount'];
        $product_quantity = $row['product_quantity'];
        $product_size = $row['product_size'];
        $order_date = $row['order_date'];
        $order_status = $row['order_status'];

        $i++;

        if($order_status == 'pending') {

            $order_status = 'Unpaid';

        }else {

            $order_status = 'Paid';

        }
    ?>

    <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $due_amount; ?></td>
    <td><?php echo $invoice_number; ?></td>
    <td><?php echo $product_quantity; ?></td>
    <td><?php echo $product_size; ?></td>
    <td><?php echo $order_date; ?></td>
    <td><?php echo $order_status; ?></td>
    <td>
    <a href="confirm.php?order_id=<?php echo $order_id; ?>" target="blank" class="btn btn-primary">Confirm</a>
    </td>
    <td>
    <a href="delete_order.php?order_id=<?php echo $order_id; ?>" class="btn btn-danger">
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
    
    </section>

    <?php require_once("includes/footer.php"); ?>
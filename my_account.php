<?php require_once("config.php"); ?>
<?php require_once("includes/header.php"); ?>


<?php 

$order_status = 'pending';


?>

<!-- Page info -->
<div class="page-top-info">
		<div class="container">
            <h4>My Account</h4>
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
    <table class="cart-table account-table table table-bordered align-items-center">
    <thead class="align-center bg-info">
     <tr>
     <th>Order</th>
     <th>Total</th>
     <th>Invoice No</th>
     <th>Product Quantity</th>
     <th>Product Size</th>
     <th>Date</th>
     <th>Order Status</th>
     
     
     </tr>
    </thead>

    <tbody>
    <?php 
    $customer_session = $_SESSION['customer_email'];

    $query_customers = query("SELECT * FROM customers WHERE customer_email='$customer_session'");
    confirm($query_customers);
    $row = fetch_array($query_customers);
    $customer_id = $row['customer_id'];
    $i = 0;
    $query_customer_orders = query("SELECT * FROM customer_orders WHERE customer_id='$customer_id'");
    confirm($query_customer_orders);
    while($row = fetch_array($query_customer_orders)) {
        $order_id = $row['order_id'];
        $customer_id = $row['customer_id'];
        $due_amount = $row['due_amount'];
        $invoice_number = $row['invoice_number'];
        $product_quantity = $row['product_quantity'];
        $product_size = $row['product_size'];
        $order_date = $row['order_date'];
        $order_status = $row['order_status'];

        $i++;

        if($order_status == 'pending') {

            $order_status = 'Placed';
        }else {

            $order_status = 'Cancelled';
        }
    ?>
    <tr>
    <td>
      <?php echo $i; ?>
    </td>
    <td>
    <?php echo $due_amount; ?>
    </td>
    <td>
      <?php echo $invoice_number; ?>			
    </td>
    <td>
     <?php echo $product_quantity; ?>				
    </td>
    <td>
    <?php echo $product_size; ?>
    </td>
    <td>
    <?php echo $order_date; ?>
    </td>
    <td>
    <?php echo $order_status; ?>
    </td>
    <td>
        <a href="my_orders.php">View Orders</a> 
        <?php if($order_status != 'Cancelled') { ?>
        |<a href="cancel.php">Cancel</a>
<?php } ?>
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
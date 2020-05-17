<?php require_once("config.php"); ?>
<?php require_once("includes/header.php"); ?>


<?php
if(isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

}


?>




<!-- Page info -->
<div class="page-top-info">
		<div class="container">
            <h4>Confirm Order</h4>
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
    <div class="col-lg-8 contact-info>
    <form action="confirm.php?update_id=<?php echo $order_id ?>" method="post">
    <div class="form-group">
    <label>Invoice No: </label>
    <input type="text" name="invoice_number" class="form-control" required>
    </div>

    <div class="form-group">
    <label>Amount Sent: </label>
    <input type="text" name="amount_sent" class="form-control" required>
    </div>

    <div class="form-group">
    <label>Select Payment Mode: </label>
    <select name="payment_mode" class="form-control" required>
    <option>Payment Mode</option>
    <option>Credit Card</option>
    <option>Debit Card</option>
    <option>Visa Master Card</option>
    <option>Western Union</option>
    <option>Pay Pal Account</option>
    </select>
    </div>

    <div class="form-group">
    <label>Transaction: </label>
    <input type="text" name="transaction" class="form-control" required>
    </div>

    <div class="form-group">
    <label>Omni Code: </label>
    <input type="text" name="omni_code" class="form-control" required>
    </div>

    <div class="form-group">
    <label>Payment Date: </label>
    <input type="text" name="payment_date" class="form-control" required>
    </div>

    <div class="form-group">
    
    <button type="submit" name="confirm" class="btn btn-primary form-control" value="Confirm Payment">
    <i class="fa fa-user"></i> Confirm Payment
    </button>
    </div>
    </form>
    </div>
    </div>
    </div>
    </section>

    <?php 
    if(isset($_POST['confirm'])) {

        $update_id = $_GET['update_id'];

        $invoice_number = escape_string($_POST['invoice_number']);
        $amount_sent = escape_string($_POST['amount_sent']);
        $payment_mode = escape_string($_POST['payment_mode']);
        $transaction = escape_string($_POST['transaction']);
        $omni_code = escape_string($_POST['omni_code']);
        $payment_date = escape_string($_POST['payment_date']);

        $complete = "Complete";

        $query_insert_payments = query("INSERT INTO payments (invoice_number,amount_sent,payment_mode,transaction,omni_code,payment_date)
        VALUES('{$invoice_number}','{$amount_sent}','{$payment_mode}','{$transaction}','{$omni_code}',NOW())");
        confirm($query_insert_payments);

        $query_update_customer_orders = query("UPDATE customer_orders SET order_status='$complete' WHERE order_id='$update_id'");
        confirm($query_update_customer_orders);

        $query_update_pending_orders = query("UPDATE pending_orders SET order_status='$complete' WHERE order_id='$update_id'");
        confirm($query_update_pending_orders);

        if($query_update_pending_orders) {

            echo "<script>alert('Your Payment has been received, order will be completed within 24 hours')</script>";
            echo "<script>window.open('my_orders.php','_self')</script>";
        }
    }
    
    
    ?>

   

    <?php require_once("includes/footer.php"); ?>
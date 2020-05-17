<?php require_once("config.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php require_once("includes/nav.php"); ?>

<?php 

if(isset($_GET['order_id'])) {

    $order_id = $_GET['order_id'];
}

?>


<!-- Page info -->
<div class="page-top-info">
		<div class="container">
            <h4>Cancel Order</h4>
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
    <div class="col-lg-6 contact-info>

   <form action="cancel.php?cancel_id=<?php echo $order_id; ?>" method="post">
    <div class="form-group">
    <label>Reason: </label>
    <input type="text" name="cancel" class="form-control">
    </div>

    <div class="form-group">
    <input type="submit" name="cancel_order" class="btn btn-primary" value="Cancel Order">
    </div>
    </form>

    </div>
    </div>
    </div>
    </section>

    <?php 
    if(isset($_POST['cancel_order'])) {
        $cancel_id = $_GET['cancel_id'];
        $cancel = escape_string($_POST['cancel']);

        $cancel = 'Cancelled';

        $query_insert_orders = query("INSERT INTO tracking_orders (order_status,message) VALUES('Cancelled','{$cancel}')");
        confirm($query_insert_orders);
    }
    
    ?>









<?php require_once("includes/footer.php"); ?>
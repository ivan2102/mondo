<?php require_once("config.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php require_once("includes/nav.php"); ?>

<?php 

$customer_session = $_SESSION['customer_email'];

if(isset($_POST['submit'])) {

	
	$customer_name = escape_string($_POST['customer_name']);
	$customer_email = escape_string($_POST['customer_email']);
	$customer_password = escape_string($_POST['customer_password']);
	$address = escape_string($_POST['address']);
	$country = escape_string($_POST['country']);
	$zip = escape_string($_POST['zip']);
	$phone = escape_string($_POST['phone']);

	$query_select_customers = query("SELECT * FROM customers WHERE customer_email='$customer_session'");
	confirm($query_select_customers);
	$count = mysqli_num_rows($query_select_customers);

	if($query_select_customers == 1) {

	$query_update_customers = query("UPDATE customers SET customer_name='$customer_name',customer_email='$customer_email',
	customer_password='$customer_password',address='$address',country='$country',zip='$zip',phone='$phone' WHERE customer_email='$customer_session'");
	confirm($query_update_customers);

	if($query_update_customers) {

		echo "<script>alert('Customer updated successfully')</script>";
	}
	else {


	$query_insert_customer = query("INSERT customers SET(customer_name,customer_email,customer_password,
	address,country,zip,phone) VALUES('{$customer_name}','{$customer_email}','{$customer_password}','{$address}','{$country}','{$zip}','{$phone}')");
	confirm($query_insert_customer);
	
	   if($query_insert_customer) {

		  echo "<script>alert('Customer inserted successfully')</script>";
	   }
	}



}


}

$query_select_customers = query("SELECT * FROM customers WHERE customer_email='$customer_session'");
confirm($query_select_customers);
$row = fetch_array($query_select_customers);

$customer_name = $row['customer_name'];
$customer_email = $row['customer_email'];
$customer_password = $row['customer_password'];
$address = $row['address'];
$country = $row['country'];
$zip = $row['zip'];
$phone = $row['phone'];






?>


	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Your cart</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Your cart</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->


<!-- checkout section  -->
<section class="checkout-section spad">
<div class="container">
<div class="row">
<div class="col-lg-8 order-2 order-lg-1">
<form class="checkout-form" action="" method="post">
<div class="cf-title">Billing Address</div>
<div class="row">
<div class="col-md-7">
	<p>*Billing Information</p>
</div>
<div class="col-md-5">
	<div class="cf-radio-btns address-rb">
		<div class="cfr-item">
			<input type="radio" name="pm" id="one">
			<label for="one">Use my regular address</label>
		</div>
		<div class="cfr-item">
			<input type="radio" name="pm" id="two">
			<label for="two">Use a different address</label>
		</div>
	</div>
</div>
</div>
<div class="row address-inputs">
<div class="col-md-12">
	<div class="form-group">
	<label>Customer Name</label>
	<input type="text" name="customer_name" value="<?php echo $customer_name; ?>" class="form-control" required>
	</div>

	<div class="form-group">
	<label>Customer Email</label>
	<input type="text" name="customer_email" value="<?php echo $customer_email; ?>" class="form-control" required>
	</div>

	<div class="form-group">
	<label>Customer Password</label>
	<input type="password" name="customer_password" value="<?php echo $customer_password; ?>" class="form-control" required>
	</div>
	
	<div class="form-group">
	<label>Address</label>
	<input type="text" name="address" value="<?php echo $address; ?>" class="form-control" required>
	</div>

	<div class="form-group">
	<label>Country</label>
	<input type="text" name="country" value="<?php echo $country; ?>" class="form-control" required>
	</div>

	<div class="form-group">
	<label>Zip</label>
	<input type="text" name="zip" value="<?php echo $zip ?>" class="form-control" required>
 </div>

 <div class="form-group">
	 <label>Phone</label>
	 <input type="text" name="phone" value="<?php echo $phone ?>" class="form-control" required>
 </div>

</div>


<!--<div class="col-md-6">
	<input type="text" placeholder="Zip code">
</div>
<div class="col-md-6">
	<input type="text" placeholder="Phone no.">
</div>-->
</div>
<div class="cf-title">Delievery Info</div>
<div class="row shipping-btns">
<div class="col-6">
	<h4>Standard</h4>
</div>
<div class="col-6">
	<div class="cf-radio-btns">
		<div class="cfr-item">
			<input type="radio" name="shipping" id="ship-1">
			<label for="ship-1">Free</label>
		</div>
	</div>
</div>
<div class="col-6">
	<h4>Next day delievery  </h4>
</div>
<div class="col-6">
	<div class="cf-radio-btns">
		<div class="cfr-item">
			<input type="radio" name="shipping" id="ship-2">
			<label for="ship-2">$3.45</label>
		</div>
	</div>
</div>
</div>
<div class="cf-title">Payment</div>
<ul class="payment-list">
<li>Paypal<a href="#"><img src="img/paypal.png" alt=""></a></li>
<li>Credit / Debit card<a href="#"><img src="img/mastercart.png" alt=""></a></li>
<li>Pay when you get the package</li>
</ul>
<button type="submit" name="submit" value="Pay Now" class="site-btn submit-order-btn">Pay Now</button>
</form>
</div>
<div class="col-lg-4 order-1 order-lg-2">
<div class="checkout-cart">
<h3>Your Cart</h3>
<ul class="product-list">
<li>
	<div class="pl-thumb"><img src="img/cart/1.jpg" alt=""></div>
	<h6>Animal Print Dress</h6>
	<p>$45.90</p>
</li>
<li>
	<div class="pl-thumb"><img src="img/cart/2.jpg" alt=""></div>
	<h6>Animal Print Dress</h6>
	<p>$45.90</p>
</li>
</ul>
<ul class="price-list">
<li>Total<span>$99.90</span></li>
<li>Shipping<span>free</span></li>
<li class="total">Total<span>$99.90</span></li>
</ul>
</div>
</div>
</div>
</div>
</section>
<!-- checkout section end -->

<?php require_once("includes/footer.php"); ?>
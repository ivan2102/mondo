<?php require_once("config.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php require_once("includes/nav.php"); ?>

<?php 

if(isset($_POST['login'])) {

	$customer_email = escape_string($_POST['customer_email']);
	$customer_password = md5($_POST['customer_password']);

	$query_select_customer = query("SELECT * FROM customers WHERE customer_email='$customer_email'
	AND customer_password='$customer_password'");
	confirm($query_select_customer);

	

	//$get_ip = getRealUserIp();

	$check_customer = mysqli_num_rows($query_select_customer);

	//$query_cart = query("SELECT * FROM cart WHERE ip_address='$get_ip'");
	//confirm($query_cart);

	//$check_cart = mysqli_num_rows($query_cart);

	if($check_customer == 0) {

		echo "<script>alert('Your Email or Password are wrong.Please try again')</script>";
		exit();
	}
	if($check_customer == 1) {

		$_SESSION['customer_email'] = $customer_email;

		echo "<script>alert('You are Logged In')</script>";
		echo "<script>window.open('my_orders.php','_self')</script>";
		exit();
	}else {

		$_SESSION['customer_email'] = $customer_email;

		echo "<script>alert('You are Logged In')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
	}
}



?>


	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
            <h4>Login</h4>
            <p class="lead">Already Our Customer?</p>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Contact</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- Contact section -->
	<section class="contact-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 contact-info">
					<h3>Get in touch</h3>
					<p>Main Str, no 23, New York</p>
					<p>+546 990221 123</p>
					<p>hosting@contact.com</p>
					<div class="contact-social">
						<a href="#"><i class="fa fa-pinterest"></i></a>
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-dribbble"></i></a>
						<a href="#"><i class="fa fa-behance"></i></a>
					</div>
					<form action="login.php" method="post" class="form-content">
					<div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="customer_email" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="customer_password" id="customer_password" class="form-control" required>
                    </div>

                    <div class="text-center">
                        <button type="submit" name="login" value="Login" class="btn btn-primary">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </button>
                    </div>
					</form>
				</div>
			</div>
		</div>
		<div class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14376.077865872314!2d-73.879277264103!3d40.757667781624285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1546528920522" style="border:0" allowfullscreen></iframe></div>
	</section>
	<!-- Contact section end -->


	


	<?php require_once("includes/footer.php"); ?>
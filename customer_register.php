<?php require_once("config.php"); ?>
<?php require_once("includes/header.php"); ?>


<!-- Page info -->
<div class="page-top-info">
		<div class="container">
            <h4>Register A New Account</h4>
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
    <div class="col-md-12">
    <div class="box">
    <form action="" method="post" class="form-horizontal">
    <div class="form-group">
    <label>Customer Name</label>
    <input type="text" name="customer_name" class="form-control" required>
    </div>

    <div class="form-group">
    <label>Customer Email</label>
    <input type="email" name="customer_email" class="form-control" required>
    </div>

    <div class="form-group">
    <label>Customer Password</label>
    <input type="password" name="customer_password" class="form-control" required>
    </div>

    <div class="form-group">
    <label>Customer Address</label>
    <input type="text" name="address" class="form-control" required>
    </div>

    <div class="form-group">
    <label>Customer Country</label>
    <input type="text" name="country" class="form-control"  required>
    </div>

    <div class="form-group">
    <label>Customer Zip</label>
    <input type="text" name="zip" class="form-control" required>
    </div>

    <div class="form-group">
    <label>Customer Phone</label>
    <input type="text" name="phone" class="form-control" required>
    </div>

    <div class="text-center">
    <button type="submit" name="register" class="btn btn-primary">
    <i class="fa fa-user-md"></i> Register
    </button>
    </div>
    
    </form>
    </div>
    </div>
    </div>
    </div>
    </section>

    <?php 
    
    if(isset($_POST['register'])) {

        $customer_name = escape_string($_POST['customer_name']);
        $customer_email = escape_string($_POST['customer_email']);
        $customer_password = escape_string($_POST['customer_password']);
        $address = escape_string($_POST['address']);
        $country = escape_string($_POST['country']);
        $zip = escape_string($_POST['zip']);
        $phone = escape_string($_POST['phone']);
        $customer_ip = getRealUserIp();

        $query_insert_customers = query("INSERT INTO customers(customer_name,customer_email,customer_password,address,country,zip,phone,customer_ip)
         VALUES('{$customer_name}','{$customer_email}','{$customer_password}','{$address}','{$country}','{$zip}','{$phone}','{$customer_ip}')");
         confirm($query_insert_customers);

         $query_cart = query("SELECT * FROM cart WHERE ip_address='$customer_ip'");
         confirm($query_cart);

         $check_cart = mysqli_num_rows($query_cart);

         if($check_cart > 0) {

            $_SESSION['customer_email'] = $customer_email;

            echo "<script>alert('You have been registred successfully')</script>";
            echo "<script>window.open('checkout.php','_self')script>";
         }else {

            $_SESSION['customer_email'] = $customer_email;

            echo "<script>alert('You have been registred successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
         }
    }
    
    
    ?>









    <?php require_once("includes/footer.php"); ?>
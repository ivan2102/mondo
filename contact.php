<?php require_once("config.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php require_once("includes/nav.php"); ?>


<!-- Page info -->
<div class="page-top-info">
<div class="container">
<h4>Contact</h4>
<div class="site-pagination">
<a href="index.php">Home</a> /
<a href="contact.php">Contact</a>
</div>
</div>
</div>
<!-- Page info end -->


<!-- Contact section -->
<section class="contact-section">
<div class="container">
<div class="row">
<div class="col-lg-6 contact-info">
<?php 

$query_contact = query("SELECT * FROM contact");
confirm($query_contact);
$row = fetch_array($query_contact);
$contact_heading = $row['contact_heading'];
$contact_desc = $row['contact_desc'];
$contact_email = $row['contact_email'];

?>
	<h3><?php echo $contact_heading; ?></h3>
	<p><?php echo $contact_desc; ?></p>
	<!--<p>Main Str, no 23, New York</p>
	<p>+546 990221 123</p>
	<p>hosting@contact.com</p>-->
	<div class="contact-social">
		<a href="http://www.pinterest.com"><i class="fa fa-pinterest"></i></a>
		<a href="http://www.facebook.com"><i class="fa fa-facebook"></i></a>
		<a href="http://www.twitter.com"><i class="fa fa-twitter"></i></a>
		<a href="http://www.dribble.com"><i class="fa fa-dribbble"></i></a>
		<a href="http://www.behance.com"><i class="fa fa-behance"></i></a>
	</div>
	<form action="" class="contact-form" method="post">
	<div class="form-group">
	<label>Your Name</label>
	<input type="text" name="your_name" class="form-control" required>
	</div>

	<div class="form-group">
	<label>Your Email</label>
	<input type="email" name="your_email" class="form-control" required>
	</div>

	<div class="form-group">
	<label>Subject</label>
	<input type="text" name="subject" class="form-control" required>
	</div>

	<div class="form-group">
	<label>Message</label>
	<textarea name="message" class="form-control" cols="30" rows="10"></textarea>
	</div>

	<div class="form-group">
	<label>Select Enquiry Type</label>
	<select name="enquiry_type" class="form-control">
	<?php 
		$query_enquiry_types = query("SELECT * FROM enquiry_types");
		confirm($query_enquiry_types);
		while($row = fetch_array($query_enquiry_types)) {
		$enquiry_title = $row['enquiry_title']; 
		echo "<option> $enquiry_title </option>";
		}
	?>
	</select>
	</div>
		<button type="submit" name="contact" value="Send Now" class="site-btn">SEND NOW</button>
	</form>

	<?php 
	
	if(isset($_POST['contact'])) {

		//Admin receives email through this code 
		$sender_name = escape_string($_POST['your_name']);
		$sender_email = escape_string($_POST['your_email']);
		$sender_subject = escape_string($_POST['subject']);
		$sender_message = escape_string($_POST['message']);
		$enquiry_type = escape_string($_POST['enquiry_type']);

		$new_message = "
		
		<h1> This Message has been sent by $sender_name </h1>
		<p> <b>  Sender Email : </b> <br> $sender_email </p>
		<p> <b>  Sender Subject : </b> <br> $sender_subject </p>
		<p> <b>  Sender Enquiry Type : </b> <br> $enquiry_type </p>
		<p> <b>  Sender Message : </b> <br> $sender_message </p>
		
		";

		$headers = "From $sender_email \r\n";
		$headers .= "Content-type: text/html\r\n";

		mail($contact_email,$headers,$sender_subject,$new_message);

		//Send Email to sender through this code

		$email = $_POST['email'];
		$subject = "Welcome to my website";
		$message = "I shall get you soon, thanks for sending us email";
	}
	
	
	?>
</div>
</div>
</div>
<div class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14376.077865872314!2d-73.879277264103!3d40.757667781624285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1546528920522" style="border:0" allowfullscreen></iframe></div>
</section>
<!-- Contact section end -->


	<!-- Related product section -->
	<section class="related-product-section spad">
		<div class="container">
			<div class="section-title">
				<h2>Your Favorites</h2>
			</div>
			<div class="row">
			<?php 
				$query_products = query("SELECT * FROM products ORDER BY RAND() LIMIT 0,4");
				confirm($query_products);
				while($row = fetch_array($query_products)) {
				$product_id = $row['product_id'];
				$product_title = $row['product_title'];
				$product_price = $row['product_price'];
				$product_image = $row['product_image'];
				?>
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<div class="tag-new">New</div>
							<img src="./img/product/<?php echo $product_image; ?>" class="img-responsive" alt="">
							<div class="pi-links">
								<a href="product.php?product_id=<?php echo $product_id; ?>" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<a href="wishlist.php?product_id=<?php echo $product_id; ?>" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$<?php echo $product_price; ?></h6>
							<p><?php echo $product_title; ?></p>
						</div>
					</div>
				</div>
				<?php } ?>
				
				<!--<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/5.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$35,00</h6>
							<p>Flamboyant Pink Top </p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/9.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$35,00</h6>
							<p>Flamboyant Pink Top </p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/1.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$35,00</h6>
							<p>Flamboyant Pink Top </p>
						</div>
					</div>
				</div>-->
			</div>
		</div>
	</section>
	<!-- Related product section end -->


	<?php require_once("includes/footer.php"); ?>
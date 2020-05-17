<?php require_once("config.php"); ?>
<?php require_once("includes/header.php"); ?>



<!-- Page info -->
<div class="page-top-info">
<div class="container">
<h4>Your cart</h4>
<div class="site-pagination">
<a href="index.php">Home</a> /
<a href="">Your cart</a>
</div>
</div>
</div>
<!-- Page info end -->


<!-- cart section end -->
<section class="cart-section spad">
<div class="container">
<div class="row">
<div class="col-lg-8">
<div class="cart-table">
<h3>Your Cart</h3>
<div class="cart-table-warp">
<table>
<thead>
	<tr>
		<th class="product-th">Product</th>
		<th class="quy-th">Quantity</th>
		<th class="size-th">Size</th>
		<th class="total-th">Price</th>
	</tr>
</thead>
<tbody>
<?php 
$ip_address = getRealUserIp();
$total = 0;


$query_cart = query("SELECT * FROM cart WHERE ip_address='$ip_address'");
confirm($query_cart);
while($row = fetch_array($query_cart)) {
$product_id = $row['product_id'];
$product_quantity = $row['product_quantity'];
$product_size = $row['product_size'];

$query_products = query("SELECT * FROM products WHERE product_id='$product_id'");
confirm($query_products);
while($row = fetch_array($query_products)) {
$product_title = $row['product_title'];
$product_price = $row['product_price'];
$product_image = $row['product_image'];
$total = $total + $product_quantity * $row['product_price'];


?>
	<tr>
		<td class="product-col">
			<img src="img/product/<?php echo $product_image; ?>" width="70" height="70" alt="">
			<div class="pc-title">
				<h4><?php echo $product_title; ?></h4>
				<p>$<?php echo $product_price; ?></p>
			</div>
		</td>
		<td class="quy-col">
			<div class="quantity">
				<div class="pro-qty">
					<input type="text" value="<?php echo $product_quantity; ?>">
				</div>
			</div>
		</td>
		<td class="size-col"><h4><?php echo $product_size; ?></h4></td>
		<td class="total-col"><h4>$<?php echo $product_price; ?></h4></td>
	</tr>

<?php }} ?>

</tbody>
</table>
</div>
<div class="total-cost">
<h6>Total <span>$<?php echo $total; ?></span></h6>
</div>
</div>
</div>
<div class="col-lg-4 card-right">
<form class="promo-code-form">
<input name="code" type="text" placeholder="Enter promo code">
<button name="submit" value="Apply Coupon" type="submit">Submit</button>
</form>
<a href="" class="site-btn">Proceed to checkout</a>
<a href="" class="site-btn sb-dark">Continue shopping</a>
</div>
</div>
</div>
</section>
<!-- cart section end -->

<!-- Related product section -->
<section class="related-product-section">
<div class="container">
<div class="section-title text-uppercase">
<h2>Continue Shopping</h2>
</div>
<div class="row">
<?php 
$query_products = query("SELECT * FROM products ORDER BY  rand() LIMIT 0,4");
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
<img src="./img/product/<?php echo $product_image; ?>" alt="">
<div class="pi-links">
	<a href="cart.php" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
	<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
</div>
</div>
<div class="pi-text">
<h6>$<?php echo $product_price; ?></h6>
<p><?php echo $product_title; ?></p>
</div>
</div>
</div>
<?php } ?>


<?php 
  if(isset($_POST['submit'])) {

	$code = escape_string($_POST['code']);

	if($code == "") {

	 }else {

		$query_coupons = query("SELECT * FROM coupons WHERE coupon_code='$code'");
		confirm($query_coupons);

		$check_coupons = mysqli_num_rows($query_coupons);

		if($check_coupons == 1) {

			$row = fetch_array($query_coupons);

			$product_id = $row['product_id'];
			$coupon_price = $row['coupon_price'];
			$coupon_limit = $row['coupon_limit'];
			$coupon_used = $row['coupon_used'];

			if($coupon_limit == $coupon_used) {
			
				echo "<script>alert('Your Coupon Code Has Been Expired')</script>";

			} 
			else {

				$query_cart = query("SELECT * FROM cart WHERE product_id='$product_id' AND ip_address='$ip_address'");
				confirm($query_cart);
				$check_cart = mysqli_num_rows($query_cart);

				if($check_cart == 1) {

				 $query_update_coupons = query("UPDATE coupons SET coupon_used=coupon_used + 1 WHERE 
				 coupon_code='$code'");
				 confirm($query_update_coupons);

				 $query_update_cart = query("UPDATE cart SET product_price='$coupon_price' WHERE product_id='$product_id'
				 AND ip_address='$ip_address'");
				 confirm($query_update_cart);

				 echo "<script>alert('Your Coupon Code Has Been Applied')</script>";
				 echo "<script>window.open('cart.php','_self')</script>";


				}
				else {

				   echo "<script>alert('Product Does Not Exist In Cart')</script>";
				}

			}


			
		}
		
		else {

			echo "<script>alert('Your Coupon Code Is Not Valid')</script>";
		}
	 }
}


?>


</div>
</div>
</section>
<!-- Related product section end -->



<?php require_once("includes/footer.php"); ?>
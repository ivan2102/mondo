<?php require_once("config.php"); ?>
<?php require_once("includes/header.php"); ?>



	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Single Product Page</h4>
			<div class="site-pagination">
				<a href="index.php">Home</a> /
				<a href="shop.php">Shop</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->

	<?php 
	
	if(isset($_GET['product_id'])) {

		$product_id = $_GET['product_id'];

		$query_products = query("SELECT * FROM products WHERE product_id='$product_id'");
		confirm($query_products);
		$row = fetch_array($query_products);
		$product_id = $row['product_id'];
		$product_title = $row['product_title'];
		$product_price = $row['product_price'];
		$product_image = $row['product_image'];
	}
	
	
	
	
	?>


	<!-- product section -->
	<section class="product-section">
		<div class="container">
			<div class="back-link">
				<a href="./category.php"> &lt;&lt; Back to Category</a>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="product-pic-zoom">
						<img class="product-big-img" src="img/product/<?php echo $product_image; ?>" alt="">
					</div>
					<div class="product-thumbs" tabindex="1" style="overflow: hidden; outline: none;">
						<div class="product-thumbs-track">
							<div class="pt active" data-imgbigurl="img/product/<?php echo $product_image; ?>"><img src="img/product/<?php echo $product_image; ?>" alt=""></div>
							<div class="pt" data-imgbigurl="img/product/<?php echo $product_image; ?>"><img src="img/product/<?php echo $product_image; ?>" alt=""></div>
							<div class="pt" data-imgbigurl="img/product/<?php echo $product_image; ?>"><img src="img/product/<?php echo $product_image; ?>" alt=""></div>
							<div class="pt" data-imgbigurl="img/product/<?php echo $product_image; ?>"><img src="img/product/<?php echo $product_image; ?>" alt=""></div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 product-details">
					<h2 class="p-title"><?php echo $product_title; ?></h2>
					<h3 class="p-price">$<?php echo $product_price; ?></h3>
					<h4 class="p-stock">Available: <span>In Stock</span></h4>
					<div class="p-rating">
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o fa-fade"></i>
					</div>
					<!--<div class="p-review">
						<a href="">3 reviews</a>|<a href="">Add your review</a>
					</div>-->
					<?php add_cart(); ?>
					<form action="product.php?add_cart=<?php echo $product_id; ?>" method="post">
					<div class="fw-size-choose">
						<p>Size</p>
						<select class="col-md-3 form-control" name="product_size" id="product_size">
						<option>Select Size</option>
						<option>32</option>
						<option>34</option>
						<option>36</option>
						<option>38</option>
						<option>40</option>
						<option>42</option>
						<!--<div class="sc-item">
							<input type="radio"  name="sc" id="xs-size">
							<label for="xs-size">32</label>
						</div>
						<div class="sc-item">
							<input type="radio"  name="sc" id="s-size">
							<label for="s-size">34</label>
						</div>
						<div class="sc-item">
							<input type="radio" name="sc"  id="m-size" checked="">
							<label for="m-size">36</label>
						</div>
						  <div class="sc-item">
							<input type="radio" name="sc"  id="l-size">
							<label for="l-size">38</label>
						</div>
						   <div class="sc-item disable">
							<input type="radio" name="sc"  id="xl-size" disabled>
							<label for="xl-size">40</label>
							</div>
						   <div class="sc-item">  
							<input type="radio" name="sc"  id="xxl-size">
							<label for="xxl-size">42</label>
							</div>-->
                            </select>
					   </div>
					<div class="quantity">
						<p>Quantity</p>
                        <div class="pro-qty"><input type="text" name="product_quantity" value="1"></div>
                    </div>
					<button type="submit" name="add_cart" class="site-btn">
                                    <i class="fa fa-shopping-cart"></i> ADD CART
                                    </button>
					</form>
					<div id="accordion" class="accordion-area">
						<div class="panel">
							<div class="panel-header" id="headingOne">
								<button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">information</button>
							</div>
							<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="panel-body">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
									<p>Approx length 66cm/26" (Based on a UK size 8 sample)</p>
									<p>Mixed fibres</p>
									<p>The Model wears a UK size 8/ EU size 36/ US size 4 and her height is 5'8"</p>
								</div>
							</div>
						</div>
						<div class="panel">
							<div class="panel-header" id="headingTwo">
								<button class="panel-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">care details </button>
							</div>
							<div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
								<div class="panel-body">
									<img src="./img/cards.png" alt="">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
								</div>
							</div>
						</div>
						<div class="panel">
							<div class="panel-header" id="headingThree">
								<button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">shipping & Returns</button>
							</div>
							<div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
								<div class="panel-body">
									<h4>7 Days Returns</h4>
									<p>Cash on Delivery Available<br>Home Delivery <span>3 - 4 days</span></p>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="social-sharing">
						<a href=""><i class="fa fa-google-plus"></i></a>
						<a href=""><i class="fa fa-pinterest"></i></a>
						<a href=""><i class="fa fa-facebook"></i></a>
						<a href=""><i class="fa fa-twitter"></i></a>
						<a href=""><i class="fa fa-youtube"></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- product section end -->


	<!-- RELATED PRODUCTS section -->
	<section class="related-product-section">
		<div class="container">
			<div class="section-title">
				<h2>RELATED PRODUCTS</h2>
			</div>
			<div class="product-slider owl-carousel">
			<?php 
			$query_products = query("SELECT * FROM products ORDER BY RAND() LIMIT 0,5");
			confirm($query_products);
			while($row = fetch_array($query_products)) {
				$product_id = $row['product_id'];
				$product_title = $row['product_title'];
				$product_price = $row['product_price'];
				$product_image = $row['product_image'];
			?>
				<div class="product-item">
					<div class="pi-pic">
						<img src="./img/product/<?php echo $product_image; ?>" alt="">
						<div class="pi-links">
							<a href="cart.php?product_id=<?php echo $product_id; ?>" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="wishlist.php?product_id=<?php echo $product_id; ?>" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$<?php echo $product_price; ?></h6>
						<p><?php echo $product_title; ?></p>
					</div>
				</div>
			<?php } ?>

				<!--<div class="product-item">
					<div class="pi-pic">
						<div class="tag-new">New</div>
						<img src="./img/product/2.jpg" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Black and White Stripes Dress</p>
					</div>
				</div>
				<div class="product-item">
					<div class="pi-pic">
						<img src="./img/product/3.jpg" alt="">
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
				<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/4.jpg" alt="">
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
				<div class="product-item">
					<div class="pi-pic">
						<img src="./img/product/6.jpg" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Flamboyant Pink Top </p>
					</div>
				</div>-->



			</div>
		</div>
	</section>
	<!-- RELATED PRODUCTS section end -->


	<?php require_once("includes/footer.php"); ?>
<?php require_once("config.php"); ?>
<?php require_once("includes/header.php"); ?>


<?php 

$customer_session = $_SESSION['customer_email'];

$query_customers = query("SELECT * FROM customers WHERE customer_email='$customer_session'");
confirm($query_customers);
$row = fetch_array($query_customers);
$customer_id = $row['customer_id'];

if(isset($_GET['product_id'])) {

    $product_id = $_GET['product_id'];

    $query_insert_wishlist = query("INSERT INTO wishlist(customer_id,product_id,added_on)
    VALUES('{$customer_id}','{$product_id}',now())");
    confirm($query_insert_wishlist);

    if($query_insert_wishlist) {

        echo "<script>alert('Your Wishlist Added Successfully')</script>";
        echo "<script>window.open('wishlist.php','_self')</script>";
    }
}



?>

<!-- Page info -->
<div class="page-top-info">
		<div class="container">
            <h4>My Wishlist</h4>
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
    <table class="cart-table account-table table table-bordered">
    <thead>
    <tr>
    <th>Wishlist ID</th>
    <th>Customer ID</th>
    <th>Product ID</th>
    <th>Product Title</th>
    <th>Product Price</th>
    <th>Added On</th>
    <th>Delete Wishlist</th>
    </tr>
    </thead>

    <tbody>

    <?php 
    $i = 0;

    $query_wishlist = query("SELECT * FROM wishlist");
    confirm($query_wishlist);
    while($row = fetch_array($query_wishlist)) {
        $wishlist_id = $row['wishlist_id'];
        $customer_id = $row['customer_id'];
        $product_id = $row['product_id'];
        $added_on = $row['added_on'];

        $i++;

    
    ?>

    <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $customer_id; ?></td>
    <td><?php echo $product_id; ?></td>
    <td>
    <?php
    $query_products = query("SELECT * FROM products WHERE product_id='$product_id'");
    confirm($query_products);
    $row = fetch_array($query_products);
    $product_title = $row['product_title'];
    $product_price = $row['product_price'];
    echo $product_title;

    ?>
    </td>
    <td>$<?php echo $product_price; ?></td>
    <td><?php echo $added_on; ?></td>
    <td>
    <a href="delete_wishlist.php?wishlist_id=<?php echo $wishlist_id;  ?>" class="btn btn-danger">
    <i class="fa fa-trash"></i>
    </a>
    </td>
    
    </tr>
    <?php }  ?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    
    </section>

    <?php require_once("includes/footer.php"); ?>
<?php require_once("../config.php"); ?>

<?php

if(!isset($_SESSION['admin_email'])) {

	echo "<script>window.open('login.php','_self')</script>";

}else {




?>

<?php 

$admin_session = $_SESSION['admin_email'];

 $query_select_admin = query("SELECT * FROM admin WHERE admin_email='$admin_session'");
 confirm($query_select_admin);
 $row = fetch_array($query_select_admin);
 $admin_id = $row['admin_id'];
 $admin_name = $row['admin_name'];
 $admin_email = $row['admin_email'];
 $admin_country = $row['admin_country'];
 $admin_image = $row['admin_image'];
 $admin_contact = $row['admin_contact'];
 $admin_job = $row['admin_job'];
 $admin_about = $row['admin_about'];

 $query_products = query("SELECT * FROM products");
 confirm($query_products);
 $count_products = mysqli_num_rows($query_products);
 echo $count_products;

 $query_customers = query("SELECT * FROM customers");
 confirm($query_customers);
 $count_customers = mysqli_num_rows($query_customers);
 echo $count_customers;

 $query_categories = query("SELECT * FROM categories");
 confirm($query_categories);
 $count_categories = mysqli_num_rows($query_categories);
 echo $count_categories;

 $query_orders = query("SELECT * FROM pending_orders");
 confirm($query_orders);
 $count_orders = mysqli_num_rows($query_orders);
 echo $count_orders;


?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Admin Panel</title>
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/ec5c5e6480.js" crossorigin="anonymous"></script>


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>

<div id="wrapper">
<?php require_once("includes/sidebar.php"); ?>
<div id="page-wrapper">
<div class="container-fluid">
<?php 

if(isset($_GET['dashboard'])) {

    require_once('dashboard.php');
}

if(isset($_GET['add_product'])) {

	require_once('add_product.php');
}

if(isset($_GET['view_products'])) {

	require_once('view_products.php');
}

if(isset($_GET['delete_product'])) {

	require_once('delete_product.php');
}

if(isset($_GET['edit_product'])) {

	require_once('edit_product.php');
}

if(isset($_GET['add_category'])) {

	require_once('add_category.php');
}

if(isset($_GET['view_categories'])) {

	require_once('view_categories.php');
}

if(isset($_GET['delete_category'])) {

	require_once('delete_category.php');
}

if(isset($_GET['edit_category'])) {

	require_once('edit_category.php');
}

if(isset($_GET['add_slide'])) {

	require_once('add_slide.php');
}

if(isset($_GET['view_slides'])) {

	require_once('view_slides.php');
}

if(isset($_GET['delete_slide'])) {

	require_once('delete_slide.php');
}

if(isset($_GET['edit_slide'])) {

	require_once('edit_slide.php');
}

if(isset($_GET['view_customers'])) {

	require_once('view_customers.php');
}

if(isset($_GET['delete_customer'])) {

	require_once('delete_customer.php');
}

if(isset($_GET['view_orders'])) {

	require_once('view_orders.php');
}

if(isset($_GET['delete_order'])) {

	require_once('delete_order.php');
}

if(isset($_GET['view_payments'])) {

	require_once('view_payments.php');
}

if(isset($_GET['delete_payment'])) {

	require_once('delete_payment.php');
}

if(isset($_GET['add_user'])) {

	require_once('add_user.php');
}

if(isset($_GET['view_users'])) {

	require_once('view_users.php');
}

if(isset($_GET['delete_user'])) {

	require_once('delete_user.php');
}

if(isset($_GET['edit_profile'])) {

	require_once('edit_profile.php');
}

if(isset($_GET['edit_contact'])) {

	require_once('edit_contact.php');
}

if(isset($_GET['add_enquiry'])) {

	require_once('add_enquiry.php');
}

if(isset($_GET['view_enquiry'])) {

	require_once('view_enquiry.php');
}

if(isset($_GET['delete_enquiry'])) {

	require_once('delete_enquiry.php');
}

if(isset($_GET['edit_enquiry'])) {

	require_once('edit_enquiry.php');
}

?>
</div>
</div>

</div>



<!--====== Javascripts & Jquery ======-->
    <script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/main.js"></script>   
</body>
</html>

<?php } ?>
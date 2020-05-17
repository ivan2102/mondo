

<?php

if(!isset($_SESSION['admin_email'])) {

   echo "<script>window.open('login.php','_self')</script>"; 

}else {




?>
<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
<span class="sr-only">Toggle Navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>

<a class="navbar-brand" href="index.php?dashboard">Admin Panel</a>
<a class="navbar-brand" href="../index.php">Home</a>
</div>

<ul class="nav navbar-right top-nav">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-user"></i>
            <?php echo $admin_name; ?> <b class="caret"></b>
        </a>

        <ul class="dropdown-menu">
            <li>
                <a href="index.php?user_profile=<?php echo $admin_id; ?>">
                    <i class="fa fa-fw fa-user"></i> Profile
                </a>
            </li>

            <li>
                <a href="index.php?view_products">
                    <i class="fa fa-fw fa-envelope"></i> Products
                    <span class="badge"><?php echo $count_products; ?></span>
                </a>
            </li>

            <li>
                <a href="index.php?view_customers">
                    <i class="fa fa-fw fa-gear"></i> Customers
                    <span class="badge"><?php echo $count_customers; ?></span>
                </a>
            </li>

            <li>
                <a href="index.php?view_categories">
                    <i class="fa fa-fw fa-gear"></i> Categories
                    <span class="badge"><?php echo $count_categories; ?></span>
                </a>
            </li>

            <li class="divider"></li>

            

            <li>
                <a href="logout.php">
                    <i class="fa fa-fw fa-power-off"></i> Log Out
                </a>
            </li>
        </ul>
    </li>
</ul>

<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li>
            <a href="index.php?dashboard">
                <i class="fa fa-fw fa-tachometer-alt"></i> Dashboard
            </a>
        </li>

        <li>
            <a href="#" data-toggle="collapse" data-target="#products">
                <i class="fa fa-fw fa-table"></i> Products
                <i class="fa fa-fw fa-caret-down"></i>
            </a>

            <ul id="products" class="collapse">
             <li>
                 <a href="index.php?add_product">Add Product</a>
             </li>

             <li>
                 <a href="index.php?view_products">View Products</a>
             </li>
            </ul>
        </li>

        <li>
            <a href="#" data-toggle="collapse" data-target="#categories">
            <i class="fa fa-fw fa-arrows-alt"></i> Categories
            <i class="fa fa-fw fa-caret-down"></i>
            </a>

            <ul id="categories" class="collapse">
                <li>
                    <a href="index.php?add_category">Add Category</a>
                </li>

                <li>
                    <a href="index.php?view_categories">View Categories</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#" data-toggle="collapse" data-target="#slides">
            <i class="fa fa-fw fa-gear"></i> Slides
            <i class="fa fa-fw fa-caret-down"></i>
            </a>

            <ul id="slides" class="collapse">
                <li>
                    <a href="index.php?add_slide">Add Slide</a>
                </li>

                <li>
                    <a href="index.php?view_slides">View Slides</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="index.php?view_customers">
                <i class="fa fa-fw fa-edit"></i> View Customers
            </a>
        </li>

        <li>
            <a href="index.php?view_orders">
                <i class="fa fa-fw fa-list"></i> View Orders
            </a>
        </li>

        <li>
        <a href="#" data-toggle="collapse" data-target="#contact">
        <i class="fa fa-fw fa-pencil-alt"></i> Contact Us
        <i class="fa fa-fw fa-caret-down"></i>
        </a>

        <ul id="contact" class="collapse">
        <li>
        <a href="index.php?edit_contact">Edit Contact</a>
        </li>

        <li>
        <a href="index.php?add_enquiry">Add Enquiry</a>
        </li>

        <li>
        <a href="index.php?view_enquiry">View Enquiry</a>
        </li>
        </ul>
        </li>

        <li>
            <a href="index.php?view_payments">
                <i class="fa fa-fw fa-pencil-alt"></i> View Payments
            </a>
        </li>

        <li>
            <a href="#" data-toggle="collapse" data-target="#users">
            <i class="fa fa-fw fa-user"></i> Users
            <i class="fa fa-fw fa-caret-down"></i>
            </a>

            <ul id="users" class="collapse">
                <li>
                    <a href="index.php?add_user">Add User</a>
                </li>

                <li>
                    <a href="index.php?view_users">View Users</a>
                </li>

                <li>
                    <a href="index.php?edit_profile=<?php echo $admin_id; ?>">Edit Profile</a> 
                </li>
            </ul>
        </li>

    
        <li>
            <a href="login.php">
            <i class="fa fa-fw fa-sign-in-alt"></i> Log In
            </a>
            </li>

        <li>
            <a href="logout.php">
             <i class="fa fa-fw fa-power-off"></i> Log Out
            </a>
        </li>
    </ul>
</div>
</nav>

<?php } ?>











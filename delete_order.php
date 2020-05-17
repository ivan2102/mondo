<?php require_once("config.php"); ?>

<?php


if(isset($_SESSION['customer_email'])) {

    if(isset($_GET['order_id'])) {

        $order_id = $_GET['order_id'];

        $query_delete_order = query("DELETE FROM customer_orders WHERE order_id='$order_id'");
        confirm($query_delete_order);

        if($query_delete_order) {

            echo "<script>alert('Your Order has been deleted successfully')</script>";
            echo "<script>window.openmy_orders.php_self')</script>";
        }
    }






?>


<?php }  ?>
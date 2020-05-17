<?php require_once("../config.php"); ?>

<?php 

if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.openlogin.php_self')</script>";

}else {


?>

<?php 

if(isset($_GET['delete_order'])) {

    $order_id = $_GET['delete_order'];

    $query_delete_order = query("DELETE FROM pending_orders WHERE order_id='$order_id'");
    confirm($query_delete_order);

    if($query_delete_order) {

        echo "<script>alert('Your Order has been deleted successfully')</script>";
        echo "<script>window.open('index.php?view_orders','_self')</script>";
    }
}



?>

<?php } ?>
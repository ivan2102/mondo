<?php require_once("../config.php"); ?>

<?php 

if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

}else {


?>

<?php 

if(isset($_GET['delete_user'])) {

    $admin_id = $_GET['delete_user'];

    $query_delete_user = query("DELETE FROM admin WHERE admin_id='$admin_id'");
    confirm($query_delete_user);

    if($query_delete_user) {

        echo "<script>alert('One Admin User has been deleted')</script>";
        echo "<script>window.open('index.php?view_users','_self')</script>";
    }
}




?>

<?php } ?>
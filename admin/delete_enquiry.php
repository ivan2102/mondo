<?php require_once("../config.php"); ?>


<?php 

if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

}else {



?>

<?php 

if(isset($_GET['delete_enquiry'])) {

    $enquiry_id = $_GET['delete_enquiry'];

    $query_delete_enquiry = query("DELETE FROM enquiry_types WHERE enquiry_id='$enquiry_id'");
    confirm($query_delete_enquiry);

    if($query_delete_enquiry) {

        echo "<script>alert('Your Enquiry has been deleted successfully')</script>";
        echo "<script>window.open('index.php?view_enquiry','_self')</script>";
    }
}



?>

<?php } ?>
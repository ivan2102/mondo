<?php require_once("../config.php"); ?>

<?php 

if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

}else {


?>

<?php 

if(isset($_GET['delete_category'])) {

    $category_id = $_GET['delete_category'];

    $query_delete_category = query("DELETE FROM categories WHERE category_id='$category_id'");
    confirm($query_delete_category);

    if($query_delete_category) {

        echo "<script>alert('One Category has been deleted successfully')</script>";
        echo "<script>window.open('index.php?view_categories','_self')</script>";
    }
}




?>

<?php }  ?>
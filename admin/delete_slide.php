<?php require_once("../config.php"); ?>

<?php

if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

}else {


?>

<?php

if(isset($_GET['delete_slide'])) {

    $slide_id = $_GET['delete_slide'];

    $query_delete_slide = query("DELETE FROM slides where slide_id='$slide_id'");
    confirm($query_delete_slide);

    if($query_delete_slide) {

        echo "<script>alert('Your Slide has been deleted successfully')</script>";
        echo "<script>window.open('index.php?view_slides','_self')</script>";
    }
}

?>


<?php } ?>
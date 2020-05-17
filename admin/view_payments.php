<?php require_once("../config.php"); ?>

<?php 

if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

}else {


?>

<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
<li class="active">
<i class="fa fa-tachometer-alt"></i> Dashboard / View Payments
</li>
</ol>
</div>
</div>

<div class="row">
<div class="col-lg-12">
<div class="panel panel-info">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-money"></i> View Payments
</h3>
</div><!--panel-heading Ends -->
</div>
</div>
</div>

<div class="panel-body">
<div class="table-responsive">
<table class="table table-bordered table-hover table-striped">
<thead>
<tr>
<th>Payment ID</th>
<th>Invoice No</th>
<th>Amount Sent</th>
<th>Payment Mode</th>
<th>Transaction</th>
<th>Omni Code</th>
<th>Payment Date</th>
<th>Delete Payment</th>
</tr>
</thead>

<tbody>
<?php 
$i = 0;

$query_payments = query("SELECT * FROM payments");
confirm($query_payments);
while($row = fetch_array($query_payments)) {
    $payment_id = $row['payment_id'];
    $invoice_number = $row['invoice_number'];
    $amount_sent = $row['amount_sent'];
    $payment_mode = $row['payment_mode'];
    $transaction = $row['transaction'];
    $omni_code = $row['omni_code'];
    $payment_date = $row['payment_date'];

    $i++;
?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $invoice_number; ?></td>
<td><?php echo $amount_sent; ?></td>
<td><?php echo $payment_mode; ?></td>
<td><?php echo $transaction; ?></td>
<td><?php echo $omni_code; ?></td>
<td><?php echo $payment_date; ?></td>
<td>
<a href="index.php?delete_payment=<?php echo $payment_id; ?>" class="btn btn-danger btn-lg">
<i class="fa fa-trash"></i>
</a>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>


<?php } ?>
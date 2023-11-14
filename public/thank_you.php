<?php
require_once("../resources/config.php");
require_once(TEMPLATE_FRONT . DS . "header.php");
?>

<?php
if (isset($_GET['tx'])) {
    $amount = $_GET['amt'];
    $currency = $_GET['cc'];
    $transaction = $_GET['tx'];
    $status = $_GET['st'];

    $query = query("INSERT INTO orders (order_amount, order_transaction, order_status, order_currency) 
    VALUES ('{$amount}', '{$transaction}', '{$status}', '{$currency}')");

    confirm($query);
    session_destroy();
} else {
    redirect("index.php");
}
?>
<!-- Page Content -->
<div class="container">
    <h1 class="text-center"> THANK YOU</h1>



</div><!--Main Content-->
<!-- Footer -->

<?php
require_once(TEMPLATE_FRONT . DS . "footer.php");
?>
<?php
require_once("../resources/config.php");
require_once(TEMPLATE_FRONT . DS . "header.php");
?>

<?php
// defines in cart.php
process_transactions();
?>
<!-- Page Content -->
<div class="container">
    <h1 class="text-center"> THANK YOU</h1>



</div><!--Main Content-->
<!-- Footer -->

<?php
require_once(TEMPLATE_FRONT . DS . "footer.php");
?>
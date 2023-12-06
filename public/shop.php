<?php
require_once("../resources/config.php");
require_once(TEMPLATE_FRONT . DS . "header.php");
?>
<!-- Page Content -->
<div class="container">
    <header>
        <h1>Shop</h1>
        </p>
    </header>
    <hr>
    <div class="row text-center">
        <?php getProducts_shop_page(); ?>
    </div>
    <?php
    require_once(TEMPLATE_FRONT . DS . "footer.php");
    ?>
</div>
<!-- /.container -->
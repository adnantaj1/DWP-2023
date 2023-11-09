<?php
require_once("../resources/config.php");

require_once(TEMPLATE_FRONT . DS . "header.php");

?>
<!-- Page Content -->
<div class="container">

    <!-- Jumbotron Header -->
    <header>
        <h1>Shop</h1>
        </p>
    </header>

    <hr>

    <!-- /.row -->

    <!-- Page Features -->
    <div class="row text-center">
        <?php getProducts_shop_page(); ?>
    </div>
    <!-- /.row -->
    <!-- include footer -->
    <?php
    require_once(TEMPLATE_FRONT . DS . "footer.php");
    ?>

</div>
<!-- /.container -->
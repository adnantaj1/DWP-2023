<?php
require_once("../resources/config.php");

require_once(TEMPLATE_FRONT . DS . "header.php");

?>


<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- categories here -->
        <?php require_once(TEMPLATE_FRONT . DS . "side_nav.php"); ?>

        <div class="col-md-9">

            <div class="row carousel-holder">

                <div class="col-md-12">
                    <!-- SLIDER Carous -->
                    <?php require_once(TEMPLATE_FRONT . DS . "slider.php"); ?>
                </div>

            </div>

            <div class="row">
                <?php getProducts(); ?>

            </div> <!-- row ends here -->

        </div>

    </div>

</div>

<?php
require_once(TEMPLATE_FRONT . DS . "footer.php")
?>
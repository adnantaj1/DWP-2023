<?php require_once("../../resources/config.php");
include(TEMPLATE_BACK . "/header.php");
?>

<?php
if (!isset($_SESSION['username'])) {
    redirect("../../public");
}
?>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Dashboard <small>Statistics Overview</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Dashboard
                    </li>
                </ol>
            </div>
        </div>

        <?php
        if (
            $_SERVER['REQUEST_URI'] == "/DWP-2023/public/admin/" ||
            $_SERVER['REQUEST_URI'] == "/DWP-2023/public/admin/index.php"
        ) {
            include(TEMPLATE_BACK . "/admin-content.php");
        }
        if (isset($_GET['orders'])) {
            include(TEMPLATE_BACK . "/orders.php");
        }
        if (isset($_GET['categories'])) {
            include(TEMPLATE_BACK . "/categories.php");
        }
        if (isset($_GET['products'])) {
            include(TEMPLATE_BACK . "/products.php");
        }
        if (isset($_GET['add_product'])) {
            include(TEMPLATE_BACK . "/add_product.php");
        }
        if (isset($_GET['users'])) {
            include(TEMPLATE_BACK . "/users.php");
        }

        // echo $_SERVER['REQUEST_URI'];
        ?>

    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<?php include(TEMPLATE_BACK . "/footer.php"); ?>
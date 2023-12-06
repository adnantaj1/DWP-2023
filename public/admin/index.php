<?php require_once("../../resources/config.php");
include(TEMPLATE_BACK . "/header.php");
if (!isset($_SESSION['username'])) {
    redirect("../../public");
}
?>
<div id="page-wrapper">
    <div class="container-fluid">
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
        if (isset($_GET['edit_product'])) {
            include(TEMPLATE_BACK . "/edit_product.php");
        }
        if (isset($_GET['users'])) {
            include(TEMPLATE_BACK . "/users.php");
        }
        if (isset($_GET['add_user'])) {
            include(TEMPLATE_BACK . "/add_user.php");
        }
        if (isset($_GET['edit_user'])) {
            include(TEMPLATE_BACK . "/edit_user.php");
        }
        if (isset($_GET['reports'])) {
            include(TEMPLATE_BACK . "/reports.php");
        }
        // echo $_SERVER['REQUEST_URI'];
        ?>
    </div>
</div>
<?php include(TEMPLATE_BACK . "/footer.php"); ?>
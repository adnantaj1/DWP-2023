<?php
require_once("../../config.php");
if (isset($_GET['id'])) {
    $query = query("DELETE FROM products 
        WHERE product_id = " . escape_string($_GET['id']) . " ");
    confirm($query);
    setMessage("product No.{$_GET['id']} Deleted");
    redirect("../../../public/admin/index.php?products");
} else {
    setMessage("Order not deleted");
    redirect("../../../public/admin/index.php?products");
}

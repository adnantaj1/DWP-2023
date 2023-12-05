<?php
require_once("../../config.php");
if (isset($_GET['id'])) {
    $query = query("DELETE FROM orders 
        WHERE order_id = " . escape_string($_GET['id']) . " ");
    confirm($query);
    setMessage("Order No.{$_GET['id']} Deleted");
    redirect("../../../public/admin/index.php?orders");
} else {
    setMessage("Order not deleted");
    redirect("../../../public/admin/index.php?orders");
}

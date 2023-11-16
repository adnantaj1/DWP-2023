<?php
require_once("../../config.php");

if (isset($_GET['id'])) {

    $query = query("DELETE FROM categories 
        WHERE cat_id = " . escape_string($_GET['id']) . " ");
    confirm($query);
    setMessage("Category {$_GET['id']} is Deleted");
    redirect("../../../public/admin/index.php?categories");
} else {
    setMessage("Category not deleted");
    redirect("../../../public/admin/index.php?categories");
}

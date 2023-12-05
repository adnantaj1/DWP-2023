<?php
require_once("../../config.php");
if (isset($_GET['id'])) {
    $query = query("DELETE FROM users 
        WHERE user_id = " . escape_string($_GET['id']) . " ");
    confirm($query);
    setMessage("User is Deleted");
    redirect("../../../public/admin/index.php?users");
} else {
    setMessage("User not deleted");
    redirect("../../../public/admin/index.php?users");
}

<?php
require_once("../../config.php");

if (isset($_GET['id'])) {

    $query = query("DELETE FROM reports 
        WHERE report_id = " . escape_string($_GET['id']) . " ");
    confirm($query);
    setMessage("Report is Deleted!");
    redirect("../../../public/admin/index.php?reports");
} else {
    setMessage("User not deleted");
    redirect("../../../public/admin/index.php?reports");
}

<?php
require_once("../../config.php");
if (isset($_GET['id'])) {
    //to delete the image from resources also
    $query_find_Image = query("SELECT slide_image FROM slides 
    WHERE slide_id = " . escape_string($_GET['id']) . " LIMIT 1");
    confirm($query_find_Image);
    $row = fetch_array($query_find_Image);
    $target_path = UPLOAD_DIRECTORY . DS . $row['slide_image'];
    unlink($target_path);

    $query = query("DELETE FROM slides 
        WHERE slide_id = " . escape_string($_GET['id']) . " ");
    confirm($query);
    setMessage("Slide is Deleted");
    redirect("../../../public/admin/index.php?slides");
} else {
    setMessage("Slide not deleted");
    redirect("../../../public/admin/index.php?slides");
}

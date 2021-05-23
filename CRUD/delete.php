<?php
    $delete_id = $_GET['bugs_id'];
    
    include "core/connectToDb.php";

    $query = ("DELETE FROM bugs WHERE bugs_id='$delete_id'");
    $insert = $db->query($query);
    if ($insert) {
        header("Location:?action=bugs");
    }
    include "core/readInJSON.php";
?>
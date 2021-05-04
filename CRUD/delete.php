<?php
    $delete_id = $_GET['bugs_id'];
    $db = new mysqli('127.0.0.1:3307', 'root', '', 'kali');

    if ($db->connect_errno != 0) { // die if error
        die($db->connect_error);
    }

    $query = ("DELETE FROM bugs WHERE bugs_id='$delete_id'");
    $insert = $db->query($query);
    if ($insert) {
        header("Location:?action=bugs");
    }
?>
<?php
    $db = new mysqli('127.0.0.1:3307', 'root', '', 'kali');

    if ($db->connect_errno != 0) { // die if error
        die($db->connect_error);
    }
?>
<?php
    include "core/validation.php";
    include "core/authentication.php";
    require_once("layout/nav.php");
    require_once("layout/header.php");


    if(!empty($_GET["action"]) && file_exists("views/".$_GET["action"].".php"))
    {
        require_once("views/".$_GET["action"].".php");
    }
    else {
        require_once("views/main.php");
    }

    require_once("layout/footer.php");
?>
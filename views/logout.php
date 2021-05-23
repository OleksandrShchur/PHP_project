<?php
    session_unset();
    unlink("cache/cache.json");
    header("Location:?action=main");
?>
<?php
    $bugs_id = (int)$_GET['bugs_id'];
    if ($bugs_id != 0) {
        include "core/connectToDb.php";

        $bugTitle_error = '';
        $details_error = '';
        $notice = '';

        $query = "SELECT * FROM bugs WHERE bugs_id='$bugs_id'";

        $result = mysqli_num_rows(mysqli_query($db, $query));
        $action = isset($_GET['action']) ? $_GET['action'] : '';

        if ($result == 0) {
            echo '<div class="error">
                    <p class="error-item">404 Page not found</p>
                    <a class="error-item" href="?action=bugs">Back to bugs page</a>
                    <a class="error-item" href="?action=main">Back to main page</a>
                </div>';
        }
        else {
            include "CRUD/".$action.".php";
        }
    }
?>
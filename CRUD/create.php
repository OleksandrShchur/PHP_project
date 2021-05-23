<?php
    if (isset($_POST['create_button'])) {
        $flagCreate = 0;
        $create_bugsTitle = $_POST['create_bugsTitle'];
        $create_details = $_POST['create_details'];
        $bugsTitle_error = '';
        $details_error = '';

        if (empty($create_bugsTitle)) {
            $bugsTitle_error = "<p>Enter bugs title</p>";

        } else $flagCreate++;
        if (empty($create_details)) {
            $details_error = "<p>Enter bugs description</p>";

        } else $flagCreate++;


        if ($flagCreate == 2)
            $id_user = $_SESSION['id'];

        if(!empty($_SESSION['admin'])) {
            if ($_SESSION['admin']) {
                $create_visible = 1;
            } else
                $create_visible = 0;
        }
        else {
            $create_visible = 0;
        }

        include "core/connectToDb.php";
        
        echo $create_visible;
        echo "<br />";
        echo $create_bugsTitle;
        echo "<br />";
        echo $create_details;
        echo "<br />";
        $query = "INSERT INTO bugs (bugsTitle, details, user_id, visible)
                VALUES ('$create_bugsTitle', '$create_details', '$id_user', '$create_visible')";
        $insert = $db->query($query);
        if ($insert) {
            echo "Record inserted successfully.";
            header("Location:?action=bugs");

        } else {
            echo "Record met problem. Please, try again";
            $db->close();
        }

        include "core/readInJSON.php";
    }
?>




<div class="create_inn">
    <div class="create">
        <h2>Add bug</h2>
        <form name="create" method="post">
            <div class="form-item">
                <label for="login">Bugs title</label><input type="text" name="create_bugsTitle">
            </div>

            <div class="form-item">

                <label for="alter-ego">Description</label>
                <input type="text" name="create_details">
            </div>
            <div class="form-item">
                <input type="submit" value="Add new record" name="create_button">
            </div>
        </form>

    </div>
    <div class="error">
        <?php
            if (!empty($bugsTitle_error)) {
                echo $bug_error;
            }
            if (!empty($details_error)) {
                echo $details_error;
            }
        ?>
    </div>
</div>
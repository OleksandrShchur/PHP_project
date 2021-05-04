<?php
    $edit_id = $_GET['bugs_id'];
    $db = new mysqli('127.0.0.1:3307', 'root', '', 'kali');

    if ($db->connect_errno != 0) { // die if error
        die($db->connect_error);
    }

    $query = "SELECT * FROM `bugs` WHERE bugs_id = '$edit_id'";
    $result = $db->query($query);
    $data = mysqli_fetch_assoc($result);
    if (isset($_POST['edit_button'])) {
        $visible = 0;
        $flagEdit = 0;
        $edit_bugTitle = $_POST['bugsTitle'];
        $edit_details = $_POST['details'];

        $edit_visible = $_POST['visible'];
        if (empty($edit_bugTitle)) {
            $bugTitle_error = "<p>Enter the title of bug</p>";

        } else $flagEdit++;
        if (empty($edit_details)) {
            $details_error = "<p>Enter the description of bug</p>";

        } 
        else $flagEdit++;

        if ($flagEdit == 2) {
            if(isset($edit_visible))
            {
                $visible=1;
            }
            else
                $visible = 0;

            $sql = "UPDATE bugs SET visible = '$visible', bugsTitle = '$edit_bugTitle', details='$edit_details' WHERE bugs_id = '$edit_id' ";
            $insert = $db->query($sql);
            if ($insert) {
                $notice = "<p>Changes are saved</p>";
                header("Location:?action=read&bugs_id=".$edit_id);
            } else {
               $db->close();

            }
        }
    }
?>

<div class="create_inn">
    <div class="create">
        <h2>Edit bug</h2>
        <form name="create" method="post">
            <div class="form-item">
                <label for="login">Title of bug</label><input type="text" name="bugsTitle" value="<?php echo $data['bugsTitle'] ?>">
            </div>

            <div class="form-item">

                <label for="alter-ego">Description</label>
                <input type="text" name="details" value="<?php echo $data['details'] ?>">
            </div>
            <div class="form-item">
                <label for="visible">Publish</label>
                <input type="checkbox" name="visible" value=<?php if($data['visible']==true) echo '"true" checked'; else echo "false"; ?>>
            </div>
            <div class="form-item">
                <input type="submit" value="Save changes" name="edit_button">
            </div>
        </form>
    </div>

    <div class="error">
        <?php
            echo $bugTitle_error;
            echo $details_error;
            echo $notice;
        ?>
    </div>
</div>
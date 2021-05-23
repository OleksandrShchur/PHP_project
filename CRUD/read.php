<?php
    $read_id = $_GET['bugs_id'];

    include "core/connectToDb.php";

    $query = "SELECT * FROM bugs JOIN users ON users.id = bugs.user_id WHERE bugs_id = '$read_id' ORDER BY date DESC";

    $result = $db->query($query);
    $data = mysqli_fetch_assoc($result);
?>

<div class="about-inner">
    <div class="about_us">
        <form class="bugsForm">
            <div class="article">
                <h2>
                    <?php 
                        echo $data['bugsTitle'];
                    ?>
                </h2>

                <div>
                    <li>Description:</li>

                    <div>
                        <?php 
                            echo $data['details'];
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <p>Date: </p>
                    <?php
                        echo $data['date']; 
                    ?>
                </div>

                <div class="form-group">
                    <p>Reported by: </p>
                    <?php
                        echo $data['userName']; 
                    ?>
                </div>
                <a href="?action=bugs" class="return">Back</a>
            </div>
        </form>
    </div>
</div>

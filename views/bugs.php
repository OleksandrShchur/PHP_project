<?php
    include "core/connectToDb.php";

    $query = $db->query("SELECT * FROM bugs JOIN users ON users.id = bugs.user_id ORDER BY date DESC");
    $dataFromDb = mysqli_fetch_array($query);

    $json = fopen("cache/cache.json", "r");
    
    $dataObject = json_decode(fread($json, filesize("cache/cache.json")));
    $dataArray = (array)$dataObject;

    $i = 0;
    do {
        $data = (array)$dataArray['id'.$i];
        $i++;
        if($data['visible'] == 1 || $_SESSION['admin'] == 1) {
            ?>
            <br/>
            <form class="bugsForm">
                <div class="article">
                    <h2>
                        <?php 
                            echo $data['title'];
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

                    <?php
                        if(!empty($_SESSION['admin'])) {
                            if($_SESSION['admin'] == 1){
                            ?>
                            <li>
                                <?php
                                    if($data['visible'] == 1) {
                                        echo "Visibility: true";
                                    }
                                    else {
                                        echo "Visibility: false";
                                    }
                                ?>
                                <br />
                                <br />
                            </li>
                        <?php }} ?>
                        <a class="viewButton" href="?action=read&amp;bugs_id=<?php echo $dataFromDb['bugs_id']?>" class="edit_btn">View</a>
                        <?php if (!empty($_SESSION['admin'])) {
                                if($_SESSION['admin'] == 1){
                                    $_SESSION['bugs_id'] = $dataFromDb['bugs_id']?>
                                <a class="editButton" href="?action=update&amp;bugs_id=<?php echo $dataFromDb['bugs_id']?>" class="edit_btn">Edit</a>
                                <a class="deleteButton" href="?action=delete&amp;bugs_id=<?php echo $dataFromDb['bugs_id']?>" onclick="return checkDelete()" class="edit_btn">Delete</a>
                    <?php }} ?>
                </div>
            </form>
        <?php }}
    while ($dataFromDb = mysqli_fetch_array($query)) ; ?>
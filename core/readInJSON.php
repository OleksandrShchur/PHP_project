<?php
    include "core/connectToDb.php";

    $query = $db->query("SELECT * FROM bugs JOIN users ON users.id = bugs.user_id ORDER BY date DESC");
    $data = mysqli_fetch_array($query);

    $json_file = fopen("cache/cache.json", "w");
    fwrite($json_file, '{');
    $i = 0;
    do{
        $data_array = array('title' => $data['bugsTitle'],
                'details' => $data['details'],
                'date' => $data['date'],
                'userName' => $data['userName'],
                'visible' => $data['visible']);

        fwrite($json_file, '"id'.$i.'":');
        fwrite($json_file, json_encode($data_array, 0, 512));
        fwrite($json_file, ',');
        $i++;
    }
    while ($data = mysqli_fetch_array($query));
    fwrite($json_file, '"end"'.':'.'"end"');
    fwrite($json_file, '}');
?>
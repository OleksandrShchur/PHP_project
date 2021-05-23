<?php
    include "core/connectToDb.php";

    $query = $db->query("SELECT * FROM bugs JOIN users ON users.id = bugs.user_id ORDER BY date DESC");
    $data = mysqli_fetch_array($query);

    $json_file = fopen("cache/cache.json", "w");
    fwrite($json_file, '{');
    do{
        $data_array = array('title' => $data['bugsTitle'],
                'details' => $data['details'],
                'date' => $data['date'],
                'userName' => $data['userName'],
                'visible' => $data['visible']);
        // $title = json_encode($data['bugsTitle'], 0, 9223372036854775807);
        // $details = json_encode($data['details'], 0, 9223372036854775807);
        // $date = json_encode($data['date'], 0, 9223372036854775807);
        // $userName = json_encode($data['userName'], 0, 9223372036854775807);
        // $visible = json_encode($data['visible'], 0, 9223372036854775807);
        // fwrite($json_file, $title);
        // fwrite($json_file, $details);
        // fwrite($json_file, $date);
        // fwrite($json_file, $userName);
        // fwrite($json_file, $visible);
        fwrite($json_file, '"'.$data['bugs_id'].'":');
        fwrite($json_file, json_encode($data_array, 0, 512));
        fwrite($json_file, ',');
    }
    while ($data = mysqli_fetch_array($query));
    fwrite($json_file, '"end"'.':'.'"end"');
    fwrite($json_file, '}');

    //fwrite($json_file, json_encode("It works", 0, 9223372036854775807));
    //fwrite($json_file, json_encode($data, 0, 9223372036854775807));
?>
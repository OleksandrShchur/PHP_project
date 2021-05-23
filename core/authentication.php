<?php
    session_start();
    include "core/readInJson.php";
    $error = '';

    if (isset($_POST['userName'])) {
        if (empty($_POST['userName']) || empty($_POST['password'])) {
            $error = "You are not entered Username or password";
        } else {
            $userName = $_POST['userName'];
            $password = $_POST['password'];
            $db = mysqli_connect('127.0.0.1:3307', 'root', '', 'kali');
            $query = "SELECT * FROM users WHERE userName = '$userName' ";
            $result = mysqli_query($db, $query);
            $data = mysqli_fetch_assoc($result);

            if( !empty($data) )
            {
                $hash = $data['password'];
                if ($data['userName'] == $userName && password_verify($password, $hash)) {
                    $_SESSION['login_user'] = $userName;
                    $_SESSION['admin'] = $data['admin'];
                    $_SESSION['id'] = $data['id'];
                    header("Location:?action=main");
                    $db->close();
                } 
            } 
            else {
                $error = 'Username or password don\'t  match';
            }
            
            $db->close();
        }
    }
?>
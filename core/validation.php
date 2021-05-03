<?php
    $userName_error = "";
    $password_error = "";
    $password_again_error = "";
    $email_error = "";
    $region_error = "";
    $flag = 0;

    if (isset($_POST['button']))
    { 
        $userName = $_POST['userName'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $region = $_POST['region'];
          
        if(empty($userName))
        {  
            $userName_error = "<p>Enter Username</p>";    
        }
    
        else if(!preg_match("/^[-_0-9a-zA-Zа-яА-Я]{4,}$/", $userName))
        { 
            $userName_error = "<p>Username is wrong <p>
                Username must contains more than 4 characters, can only contain Latin 
                and Cyrillic letters (uppercase and lowercase), numbers, underscores, and hyphens"; 
        }
        else $flag++; 

        if(empty($password))
        {  
            $password_error = "<p>Enter password</p>";
            
        }
        else if(!preg_match("/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]){7,}/", $password))
        { 
            $password_error = "<p>Enter password <p>The password must be at least 7 letters,
                must contain uppercase and lowercase letters, as well as numbers ";   
        }
        else $flag++; 

        if(empty($_POST['password_again']))
        {  
            $password_again_error = "<p>Enter password again</p>";
         
        }
        else if(strcmp($_POST['password'],$_POST['password_again']))
        { 
            $password_again_error = "<p>Passwords do not match<p>";
        }
        else $flag++;  

        if(empty($email))
        {  
            $email_error = "<p>Enter email</p>";
        }
        else if(!preg_match("/[0-9a-z]+@[a-z]/", $email))
        { 
            $email_error = "<p>Incorrect email</p>";  
        }
        else $flag++;

        if($region==0)
        {
            $region_error = "<p>Select region</p>";
        }
        else $flag++;

        // insert new record in db if everything okay
        if($flag == 5)
        {
            $db = new mysqli('127.0.0.1:3307', 'root', '', 'kali');

            if ($db->connect_errno != 0) { // die if error
                die($db->connect_error);
            }

            $password_hash = password_hash($password, PASSWORD_BCRYPT);

            $query = "INSERT INTO users (userName, password, email, region, admin)
            VALUES ('$userName', '$password_hash','$email', '$region', 0)";

            $insert = $db->query($query);

            if($insert){
                echo "Record inserted successfully.";
            } 
            else {
                echo "ERROR: Could not able to execute $query. " . db->error($db);
            }               
            $db->close();
                  
            header("Location:?action=registration_successful");
        }
    }
?>
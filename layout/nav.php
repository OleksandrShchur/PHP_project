<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" />
        <link rel="stylesheet" href="css/all.min.css" />
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/index.css" />
        <link rel="stylesheet" href="css/nav.css" />
        <link rel="stylesheet" href="css/login.css" />
        <link rel="stylesheet" href="css/errors.css" />
        <link rel="stylesheet" href="css/bugsForm.css" />
        <script src="js/jquery.min.js"></script>
        <script src="js/parallax.min.js"></script>
        <script src="js/main.js"></script>
        <title>Kali Linux - one of the best Linux distributions</title>
    </head>

    <body>
      <div class="navbar">
        <a href="?action=main">Home</a>
        <a href="?action=about">About us</a>
        <a href="?action=bugs">View bugs</a>

        <?php
          if (empty($_SESSION['login_user'])) {
              echo '<button id="registration" style="width:auto;">Registration</button>';
              echo '<div class="header_item headerButton">';
              echo '<a href="?action=login">';
              echo 'Login</a></div>';
          } else {
              echo '<div class="header_item headerButton">
                      <a href="?action=create_bug"/>';
              echo 'Add new bug</a></div>';

              echo '<div class="header_item headerButton">
                      <a href="?action=logout"/>';
              echo 'Logout</a></div>';
          }
        ?>
      </div>


<script>
  document.getElementById("Login").onclick = function() { 
    location.href='?action=login';
  }

</script>

<script>
  document.getElementById("registration").onclick = function() { 
    location.href='?action=registration';
  }

</script>
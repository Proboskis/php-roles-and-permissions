<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <style>
        body {
            font-family: verdana;
            font-size: 1rem;
        }
        header {
            height: 2rem;
            padding: 1rem;
            background-color: #306487;
            color: white;
        }

        header a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
<?php
    echo '
    <header>
       <a href="index.php"> home </a> .
       <a href="admin.php"> admin </a> .
       <a href="acc.php"> accountant </a> .
       <a href="recept.php"> receptionist </a> .
       <a href="signup.php"> signup </a> .
       <a href="login.php"> login </a> .
       <a href="logout.php"> logout </a> .
       
    </header>
    ';
?>
<span>
    <?php
        if (isset($_SESSION['sess_name'])) {
            echo "Hello " . $_SESSION['sess_name'];
        }
    ?>
</span>
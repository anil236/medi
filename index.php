<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <title>Medical Page</title>

    <?php
    include "includes/head_links.php";
    ?>

</head>
<body>

    <?php
    include "includes/header.php";
    ?>
    <?php
    include "api/submit.php";
    include "api/login_submit.php";
    ?>
    
    
</body>
</html>



<!-- <div id="header">
        <div class="container"> -->
            <!-- <nav class="navbar">
                <img src="img/logo.jpg" class="logo">
                <label for="" class="icons">
                    <i class='bx bx-menu'></i>
                </label>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="main.php">Services</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
            </nav> -->
        <!-- </div>     -->
            <!-- <div class="header-text">
                <p>MED-TRANSLATOR</p>
                <h1>"WRITING THE <br><span>LANGUAGE</span> OF HEALING"</h1>
            </div>
            <a href="main.php" class="btn btn2">Lets start</a>
    </div> -->
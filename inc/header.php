<?php
    @session_start(); //inicjalizuje sesje 
    if(isset($_SESSION['user'])){ //jezeli jest to pierwsza sesja to
        $session = $_SESSION['user']; //przypisuje zmienna
    } else {
        $session = null;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PhotoGallery</title>
        <link rel="stylesheet" type="text/css" href="css/vendor/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/vendor/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/vendor/simpletextrotator.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
            window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>');
        </script>
    </head>
    <body>
        <header>
            <div id="js-mySidenav" class="sidenav">
                    <a href="#">Home</a>
                    <a href="#">Gallery</a>
                    <a href="#">About</a>
                    <a href="#">Contact</a>
                <?php
                if($session == null) {               
                ?>
                    <a class="login" href="#">Login</a>
                    <a class="register" href="#">Register</a>
                <?php
                } else {

                ?>
                    <a  class="logout" href="#">Logout</a>
                <?php
                }
                ?>  
            </div>
            <div id="js-main">
                <div class="container">
                    <div class="row">
                        <a href="#" class="logo pull-left">Photo<span>Gallery</span></a>
                        <nav class="pull-right">
                            <button type="button" class="btn hamburger" onclick="clickCounter()">
                                <i id="js-nav-icon" class="fa fa-navicon"></i>
                            </button>
                        </nav>
                    </div>
                </div>
        </header>
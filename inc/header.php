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
    </head>
    <body>
        <header>
            <div class="container">
                <div class="row">
                    <a href="#" class="logo pull-left">Photo<span>Gallery</span></a>
                    <nav class="pull-right">
                        <button type="button" class="btn" data-toggle="collapse" data-target="#menu">
                            <i class="fa fa-navicon"></i>
                        </button>
                        <div id="menu" class="collapse">
                            <ul>
                                <li><a href="">Home</a></li>
                                <li><a href="">Gallery</a></li>
                                <li><a href="">About</a></li>
                                <li><a href="">Contact</a></li>
                                <?php
                                    if($session == null) {
                                    
                                ?>
                                    <li class="login"><a href="">Login</a></li>
                                    <li class="register"><a href="">Register</a></li>
                                <?php
                                    } else {

                                ?>
                                    <li class="logout"><a href="">Logout</a></li>
                                <?php
                                    }
                                ?>  
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
<?php 
session_start();
require_once('includes/config.php');

?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="assets/style.css">

    <link rel="shortcut icon" href="assets/img/tab-icon" type="image/x-icon"/>

    <title>Home</title>

</head>

<body>
    <div class="container" style="height:fit-content">

        <!-- Header -->
        <?php include('includes/header.php');?>

        <!-- Navbar -->
        <?php include('includes/nav.php');?>

        <!-- Urgent Bar -->
        <?php include('includes/urgent.php');?>

        <!-- Main Content -->
        <div class="row main-content" style="fit-content">

            <!-- Home Page -->
            <div class="main-news col-md-8 h-100">

                <?php 

                    
                
                ?>
                <div class="row" style="{height:12.5%; padding:10px}">
                    <img class="col-md-12 ad2" src="assets/img/ad2.png" alt="">
                </div>
                <div class="row left" style="margin:10px 0">
                    <a href="details.php" class="col-md-8 feature" style="background-image: url('assets/img/feature.jpg')">
                        <h4 class="feature-title">إسرائيل تبدأ بتخزين 'العلاج المعجزة' لفيروس كورونا</h4>
                    </a>
                    <div class="most-recent col-md-4">
                        <a href="details.php" class="row recent h-25">
                            <img class="recent-pic col-md-4 img-fluid" src="assets/img/2.jpeg">
                            <div class="title col-md-8">إسرائيل تبدأ بتخزين 'العلاج المعجزة' لفيروس كورونا</div>
                        </a>
                        <hr>
                        <a href="details.php" class="row recent h-25">
                            <img class="recent-pic col-md-4 img-fluid" src="assets/img/3.jpeg">
                            <div class="title col-md-8">إسرائيل تبدأ بتخزين 'العلاج المعجزة' لفيروس كورونا</div>
                        </a>
                        <hr>
                        <a href="details.php" class="row recent h-25">
                            <img class="recent-pic col-md-4 img-fluid" src="assets/img/4.jpeg">
                            <div class="title col-md-8">إسرائيل تبدأ بتخزين 'العلاج المعجزة' لفيروس كورونا</div>
                        </a>
                        <hr>
                        <a href="details.php" class="row recent h-25">
                            <img class="recent-pic col-md-4 img-fluid" src="assets/img/feature.jpg">
                            <div class="title col-md-8">إسرائيل تبدأ بتخزين 'العلاج المعجزة' لفيروس كورونا</div>
                        </a>
                    </div>
                </div>
                <div class="row" style="height:15%">
                    <img class="col-md-12 ad2" src="assets/img/ad2.png" alt="">
                </div>
                <div class="row buttom-news" style="height:25%">
                    <a href="details.php" class="row recent col-md-3">
                        <img class="recent-pic img-fluid h-75" src="assets/img/2.jpeg">
                        <div class="title h-25">إسرائيل تبدأ بتخزين 'العلاج المعجزة' لفيروس كورونا</div>
                    </a>
                    <hr>
                    <a href="details.php" class="row recent col-md-3">
                        <img class="recent-pic img-fluid h-75" src="assets/img/3.jpeg">
                        <div class="title h-25">إسرائيل تبدأ بتخزين 'العلاج المعجزة' لفيروس كورونا</div>
                    </a>
                    <hr>
                    <a href="details.php" class="row recent col-md-3">
                        <img class="recent-pic img-fluid h-75" src="assets/img/4.jpeg">
                        <div class="title h-25">إسرائيل تبدأ بتخزين 'العلاج المعجزة' لفيروس كورونا</div>
                    </a>
                    <hr>
                    <a href="details.php" class="row recent col-md-3">
                        <img class="recent-pic img-fluid h-75" src="assets/img/feature.jpg">
                        <div class="title h-25">إسرائيل تبدأ بتخزين 'العلاج المعجزة' لفيروس كورونا</div>
                    </a>
                </div>
            </div>

            <!-- SideNav -->
            <?php include('includes/sidenav.php');?>

        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
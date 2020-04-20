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
    <link type="text/css" rel="stylesheet" href="assets/details.css">

    <link rel="shortcut icon" href="assets/img/tab-icon" type="image/x-icon" />

    <title>Details</title>

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

            <?php 
                if (!isset($_GET['id'])){
                    header("location:index.php");
                }
                $id = $_GET['id'];
                
                $query = "SELECT title, img, date, content FROM news WHERE id = $id";
                
                $result = mysqli_query($con, $query);
                if(mysqli_num_rows($result)==1){
                
                $thisNews = mysqli_fetch_array($result);
                }
                else{
                    echo "Can't find article";
                    die();
                }
            ?>

            <!-- Home Page -->
            <div class="details main-news  col-md-8 h-100">
                <div class="row" style="{height:12.5%; padding:10px}">
                    <img class="col-md-12 ad2" src="assets/img/ad2.png" alt="">
                </div>
                <div class="row news-main-title">
                    <?php echo $thisNews[0];?>
                </div>
                <div class=" row news-img">
                    <?php echo '<img src="'."data:image/jpeg;charset=utf8;base64,".base64_encode($thisNews[1]).'"'.'class="main-img img-fluid">';?>
                </div>
                <hr>
                <div class="row news-date">
                    <?php echo $thisNews[2];?>
                </div>
                <div class="row news-content">
                    <?php echo $thisNews[3];?>
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
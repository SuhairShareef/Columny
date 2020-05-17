<?php 
require_once 'includes/config.php';
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="assets/style.css">
    <link type="text/css" rel="stylesheet" href="assets/includesStyle.css">
    <link rel="shortcut icon" href="assets/img/tab-icon" type="image/x-icon" />
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        (function update() {
            $.ajax({
                type: "GET",
                url: "getAdsTop.php",
                dataType: "html",
                success: function(response) {
                    $("#Top").html(response);
                },
                complete: function() {
                    setTimeout(update, 5000);
                }
            });
        })();
    });
    </script>

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
                    
                    //Featured news fetching 
                    $query = "SELECT id, img, title FROM news WHERE feature = '1'";
                    $result = mysqli_query($con, $query);

                    if (mysqli_num_rows($result) == 1) {
                    $mainFeatured = mysqli_fetch_array($result);
                    }

                    else {
                        echo "Can't find featured news!";
                    }

                    //Latset news fetching 
                    $query ="SELECT id, img, title, thumbnail FROM news WHERE feature = '0' ORDER BY date DESC LIMIT 8";
                    $result = mysqli_query($con, $query);

                    if (mysqli_num_rows ($result) >= 1){
                    $latestNews = mysqli_fetch_array($result);
                    }

                    else {
                        echo "Can't find latest news!";
                    }

                    $count = mysqli_num_rows($result);
                ?>
                <div id="Right" class="row" style="{height:12.5%; padding:10px}">
                    <img class="col-md-12 ad2" src="assets/img/ad2.png" alt="">
                </div>
                <div class="row left" style="margin:10px 0">
                    <a href="details.php?<?php echo 'id='.$mainFeatured[0];?>" class="col-md-8 feature"
                        style="background-image: url('<?php echo $mainFeatured[1];?>')">
                        <h4 class="feature-title"><?php echo htmlentities($mainFeatured[2]);?></h4>
                    </a>

                    <div class="most-recent col-md-4">
                        <?php 
                    while ($count > 4) {

                        echo '<a href="details.php?id='.$latestNews[0].'"'.' class="row recent h-25">';
                        echo '<img class="recent-pic col-md-4 img-fluid" '.' src="'.$latestNews[3].'">';
                        echo '<div class="title col-md-8">'.htmlentities($latestNews[2]).'</div></a><hr>';
                        $latestNews = mysqli_fetch_array($result);
                        $count--;
                    }
                    
                    ?>
                    </div>
                </div>
                <div id="Bottom" class="row" style="height:15%">
                    <img class="col-md-12 ad2" src="assets/img/ad2.png" alt="">
                </div>
                <div class="row buttom-news" style="height:25%">
                    <?php 
                        while ($count > 0) {

                            echo '<a href="details.php?id='.$latestNews[0].'"'.' class="row recent col-md-3">';
                            echo '<img class="recent-pic img-fluid h-75" '.' src="'.$latestNews[3].'">';
                            echo '<div class="title h-25">'.htmlentities($latestNews[2]).'</div></a><hr>';
                            $latestNews = mysqli_fetch_array($result);
                            $count--;
                        }
                    ?>
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
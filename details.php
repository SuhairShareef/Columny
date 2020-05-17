<?php 
session_start();
require_once 'includes/config.php';
if (!isset($_GET['id'])){
    header("location:home.php");
}

$id = $_GET['id'];

// Update num of views
$query = "UPDATE news SET views = views + 1 WHERE id = $id";
$result = mysqli_query($con, $query);

?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="assets/style.css">
    <link type="text/css" rel="stylesheet" href="assets/details.css">
    <link type="text/css" rel="stylesheet" href="assets/includesStyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <link rel="shortcut icon" href="assets/img/tab-icon" type="image/x-icon" />
    <script src="JS/commentAJAX.js"></script>
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
        <div class="row main-content" style="height:fit-content">

            <?php 
                
                $id = $_GET['id'];
                $query = "SELECT title, img, date, content FROM news WHERE id = $id";
                
                $result = mysqli_query($con, $query);
                if (mysqli_num_rows($result) == 1) {
                
                $thisNews = mysqli_fetch_array($result);
                }

                else {
                    echo "Can't find article";
                    die();
                }
            ?>

            <!-- Home Page -->
            <div class="details main-news col-md-8" style="height:fit-content">
                <div class="row" style="{height:12.5%; padding:10px}">
                    <img class="col-md-12 ad2" src="assets/img/ad2.png" alt="">
                </div>
                <div class="row news-main-title">
                    <?php echo $thisNews[0];?>
                </div>
                <div class=" row news-img">
                    <?php echo '<img src="'.$thisNews[1].'"'.'class="main-img img-fluid">';?>
                </div>
                <hr>
                <div class="row news-date">
                    <?php echo $thisNews[2];?>
                </div>
                <div class="row news-content">
                    <?php echo $thisNews[3];?>
                </div>
                <div class="row comment-form">
                    <!---Comment Section --->
                    <div class="col-md-12">
                        <div class="card my-4">
                            <h5 class="card-header">اترك تعليقك: </h5>
                            <div class="card-body">
                                <form name="Comment" method="post" action="commentAdd.php">
                                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control"
                                            placeholder="أدخل اسمك الكامل" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control"
                                            placeholder="أدخل بريدك الالكتروني" required>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="content" rows="3" placeholder="اكتب..."
                                            required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="submit">موافق</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row comment-section-view">
                    <?php 
                    $id = $_GET['id'];
                    $query = "SELECT name, content, date FROM comments WHERE newsId = $id";
                    $result = mysqli_query($con, $query);

                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <div class="media col-md-12 ">
                        <img class="d-flex w-100 col-md-2 rounded-circle user-img" src="assets/img/usericon.png" alt="">
                        <div class="col-md-10 media-body">
                            <div class="name"><?php echo htmlentities($row['name']);?></div>
                            <div class="date"><?php echo htmlentities($row['date']);?></div>
                            <div class="content"><?php echo htmlentities($row['content']);?></div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <!-- SideNav -->
            <?php include('includes/sidenav.php');?>
        </div>
    </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
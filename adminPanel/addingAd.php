<?php
session_start();
include('includes/config.php');
$user_roll = htmlspecialchars($_SESSION['user_roll']);
if((strlen($_SESSION['login']) == 0))
{ 
    header('location:index.php');
}
elseif ($user_roll !='admin'){ 
    header('location:home.php');
}
else {
    if (isset($_POST['submit'])){
        $owner = $_POST['owner'];
        $position = $_POST['position'];
        $link = $_POST['link'];
        $period = $_POST['period'];

        //Getting the uploaded image
        $adImage = $_FILES["adImage"]["name"];
        $adImageTempName = $_FILES["adImage"]["tmp_name"];
        $adImageSize = $_FILES["adImage"]["size"];
        $adImageError = $_FILES["adImage"]["error"];
        $adImageType = $_FILES["adImage"]["type"];

        $imgExt = explode('.', $adImage);
        $imgActualExt = strtolower(end($imgExt));
            
        //Image types that are allowed in the website
        $allowedExtentions = array("jpg", "jpeg", "png", "gif");
            
        //Checking the image extention
        if (in_array($imgActualExt, $allowedExtentions)) {
            //Checking for errors in upload 
            if ($adImageError === 0) {
                //Checking for image size
                if ($adImageSize < 100000) {
                    $adImageNewName = uniqid('', true).".".$imgActualExt;
                    $imgDestination = 'assets/img/uploads/ads/'.$adImageNewName;
                    move_uploaded_file($adImageTempName, $imgDestination);

                    $query = "INSERT INTO ads(owner, position, link, period_of_view, img) 
                            VALUES('$owner', '$position', '$link', '$period_of_view', '$imgDestination') ";
                    $result = mysqli_query($con,$query);

                    if($result) {
                         header('location:ads.php');
                    }

                    else {
                        echo "<script>alert('Something went wrong. Please try again.');</script>"; 
                    }
                }
                else {
                    echo "<script>alert('Your image is too big!');</script>";
                }
            }
            else {
                echo "<script>alert('There was an error uploading your image!');</script>";
            }
        }
        else {
            echo "<script>alert('Invalid format. Only jpg / jpeg/ png format allowed');</script>";
        }
    }
} 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Advertising</title>
    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

</head>


<body class="fixed-left">
    <div id="wrapper">

        <!-- Top Bar -->
        <?php include('includes/topheader.php');?>

        <!-- Left Sidebar -->
        <?php include('includes/leftsidebar.php');?>

        <!-- Content -->
        <div class="content-page">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Add Advertising</h4>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="p-6">
                                <div class="">
                                    <form action="addingAd.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group m-b-20">
                                            <label for="exampleInputEmail1">Owner Name</label>
                                            <input type="text" class="form-control" id="title" name="owner"
                                                placeholder="Enter title" required maxlength="100">
                                        </div>
                                        <div class="form-group m-b-20">
                                            <label>Position</label>
                                            <select class="form-control" name="position" id="position" required>
                                                <option value="">Position</option>
                                                <?php
                                                //Fetching positions
                                                $query = "SELECT * FROM adsposition";
                                                $result = mysqli_query($con,$query);

                                                while ($position = mysqli_fetch_array($result))
                                                {    
                                                ?>
                                                <option value="<?php echo htmlentities($position['position']);?>">
                                                    <?php echo htmlentities($position['position']);?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group m-b-20">
                                            <label for="exampleInputEmail1">Link</label>
                                            <input type="text" class="form-control" id="link" name="link"
                                                placeholder="Enter link" required>
                                        </div>
                                        <div class="form-group m-b-20">
                                            <label>Period of View</label>
                                            <select class="form-control" name="period" id="period" required>
                                                <option value="">Period of View</option>
                                                <?php
                                                    $i = 30;
                                                while ($i < 70 )
                                                {    
                                                ?>
                                                <option value="<?php echo htmlentities($i);?>">
                                                    <?php echo htmlentities($i);?></option>

                                                <?php $i = $i + 10;
                                                } 
                                                ?>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card-box">
                                                    <h4 class="m-b-30 m-t-0 header-title"><b>Image</b></h4>
                                                    <input type="file" class="form-control" id="image" name="adImage"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" name="submit"
                                            class="btn btn-success waves-effect waves-light">Save</button>
                                        <button type="button"
                                            class="btn btn-danger waves-effect waves-light">Discard</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>

    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>
</body>

</html>
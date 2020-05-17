<?php 
session_start();
include ('includes/config.php');

$msg = "";
$error = "";
if (strlen($_SESSION['login']) == 0) { 
    header('location:index.php');
}

else {
    if (isset($_POST['update'])){
        $owner = $_POST['owner'];
        $position = $_POST['position'];
        $link = $_POST['link'];
        $period = $_POST['period'];
        $id = intval($_GET['id']);
        
        $query = "UPDATE ads SET owner = '$owner', position = '$position', link = '$link', period_of_view = '$period' WHERE id='$id'";
        $result = mysqli_query($con, $query);

        if ($result)
            $msg = "Post updated ";
        else
            $error = "Something went wrong . Please try again.";  
                
    }
        
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <title>Edit Ads</title>

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

        <div class="content-page">
            <!--content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Edit Advertising </h4>
                                <ol class="breadcrumb p-0 m-0"></ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!---Success Message--->
                            <?php if($msg){ ?>
                            <div class="alert alert-success" role="alert">
                                <strong>Well done!</strong> <?php echo htmlentities($msg);?>
                            </div>
                            <?php } ?>

                            <!---Error Message--->
                            <?php if($error){ ?>
                            <div class="alert alert-danger" role="alert">
                                <strong>Oh snap!</strong> <?php echo htmlentities($error);?></div>
                            <?php } ?>
                        </div>
                    </div>

                    <?php
                    $adId = intval($_GET['id']);
                    $query = "SELECT owner, position, link, period_of_view FROM ads WHERE id='$adId'";
                    $result = mysqli_query($con, $query);
                    
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="p-6">
                                <div class="">
                                    <form name="addpost" method="post">
                                        <div class="form-group m-b-20">
                                            <label>Owner</label>
                                            <input type="text" class="form-control" id="owner"
                                                value="<?php echo htmlentities($row['owner']);?>" name="owner"
                                                placeholder="Enter owner" required>
                                        </div>
                                        <div class="form-group m-b-20">
                                            <label for="exampleInputEmail1">Position</label>
                                            <select class="form-control" name="position" id="position" required>
                                                <option>
                                                    </option>
                                                    <?php
                                                //Fetching categories
                                                $query2 = "SELECT * FROM adsposition";
                                                $result2 = mysqli_query($con,$query2);

                                                while ($position = mysqli_fetch_array($result2))
                                                {    
                                                ?>
                                                <option value = "<?php echo htmlentities($position['position']);?>">
                                                    <?php echo htmlentities($position['position']);?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group m-b-20">
                                            <label>Link</label>
                                            <input type="text" class="form-control" id="link"
                                                value="<?php echo htmlentities($row['link']);?>" name="link"
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
                                        <?php } ?>

                                        <button type="submit" name="update"
                                            class="btn btn-success waves-effect waves-light">Update</button>
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
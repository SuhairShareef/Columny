<?php
session_start();
include('includes/config.php');

if(strlen($_SESSION['login']) == 0)
{ 
header('location:index.php');
}
else{
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home</title>

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/myStyle.css" rel="stylesheet" type="text/css" />

</head>


<body class="fixed-left">
    <div id="wrapper">
        <div class="topbar">

            <div class="topbar-left">
                <a href="home.php" class="logo"><span>NP<span>Admin</span></span><i class="mdi mdi-layers"></i></a>
            </div>

            <!--Top Sidebar -->
            <?php include('includes/topheader.php');?>
        </div>

        <!--Left Sidebar -->
        <?php include('includes/leftsidebar.php');?>

        <!--Content -->
        <div class="content-page">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Home</h4>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <?php 
                        
                        if ($_SESSION['user_roll'] == "admin")
                            include('homeViews/adminView.php');
                        
                        else if ($_SESSION['user_roll'] == "editor")
                        include('homeViews/editorView.php');
                        
                        else if ($_SESSION['user_roll'] == "author")
                        include('homeViews/authorView.php');
                    ?>
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
<?php } ?>
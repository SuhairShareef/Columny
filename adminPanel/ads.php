<?php 
session_start();

include('includes/config.php');
if (strlen($_SESSION['login']) == 0) { 
    header('location:index.php');
}

if ($_SESSION['user_roll'] == "admin") {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'del') {
            $id = intval($_GET['id']);
            $query = "DELETE FROM ads WHERE id=$id";
            $result = mysqli_query($con,$query);
        }
    }
}
else {
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <title>All News</title>

    <!-- Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

    <script src="assets/js/modernizr.min.js"></script>

</head>


<body class="fixed-left">

    <div id="wrapper">

        <!-- Top Bar -->
        <?php include('includes/topheader.php');?>

        <!-- Left Sidebar -->
        <?php include('includes/leftsidebar.php');?>

        <div class="content-page">
            <!-- Content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="page-title-box">
                                <h4 class="page-title">All News</h4>
                                <ol class="breadcrumb p-0 m-0"></ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <div class="m-b-30">
                                    <a href="addingAd.php">
                                        <button id="addAds" class="btn btn-success waves-effect waves-light">Add
                                            <i class="mdi mdi-plus-circle-outline"></i></button>
                                    </a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-colored table-centered table-inverse m-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Owner</th>
                                                <th>Position</th>
                                                <th>Image</th>
                                                <th>Link</th>
                                                <th># Of Clicks</th>
                                                <th>Period Of view</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                
                                                $query = "SELECT * FROM ads";
                                                $result = mysqli_query($con, $query);
                                                $rowcount = mysqli_num_rows($result);
                                                $count = 1;

                                                if ($rowcount == 0){
                                                ?>
                                            <tr>
                                                <td colspan="4" align="center">
                                                    <h3 style="color:red">No ads found</h3>
                                                </td>
                                            <tr>
                                                <?php }
                                                    else {
                                                        while($row = mysqli_fetch_array($result)) {     
                                                ?>
                                            <tr>
                                                <th scope="row"><?php echo htmlentities($count);?></th>
                                                <td><b><?php echo htmlentities($row['owner']);?></b></td>
                                                <td><?php echo htmlentities($row['position'])?></td>
                                                <td><img src="../<?php echo htmlentities($row['img'])?>" alt="" width="200" ></td>
                                                <td><?php echo htmlentities($row['link'])?></td>
                                                <td><?php echo htmlentities($row['number_of_clicks'])?></td>
                                                <td><?php echo htmlentities($row['period_of_view'])?></td>
                                                <td><a href="editAds.php?id=<?php echo htmlentities($row['id']);?>"><i
                                                            class="fa fa-pencil" style="color: #29b6f6;"></i></a>
                                                    &nbsp;<a
                                                        href="ads.php?id=<?php echo htmlentities($row['id']);?>&&action=del"
                                                        onclick="return confirm('Do you really want to delete ?')"><i
                                                            class="fa fa-trash-o" style="color: #f05050"></i></a></td>
                                               
                                            </tr>
                                            <?php  $count++;}}
                                            ?>

                                        </tbody>
                                    </table>
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
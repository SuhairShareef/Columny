<?php 
session_start();

include('includes/config.php');
if (strlen($_SESSION['login']) == 0) { 
    header('location:index.php');
}
if ($_SESSION['user_roll'] != 'author') { 
    header('location:index.php');
}

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'del') {
        $id = intval($_GET['pid']);
        $query = "DELETE FROM news WHERE id=$id";
        $result = mysqli_query($con,$query);
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
                                <div class="table-responsive">
                                    <table class="table table-colored table-centered table-inverse m-0">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Date Created</th>
                                                <th>Views</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $author_id = $_SESSION['user_id'];
                                                $query = "SELECT id, title, category, date, views FROM news WHERE approve ='1' AND author_id = '$author_id'";
                                                $result = mysqli_query($con, $query);
                                                $rowcount = mysqli_num_rows($result);

                                                if ($rowcount == 0){
                                                ?>
                                            <tr>
                                                <td colspan="4" align="center">
                                                    <h3 style="color:red">No news found</h3>
                                                </td>
                                            <tr>
                                                <?php }
                                                    else {
                                                        while($row = mysqli_fetch_array($result)) {         
                                                ?>
                                            <tr>
                                                <td><b><?php echo htmlentities($row['title']);?></b></td>
                                                <td><?php echo htmlentities($row['category'])?></td>
                                                <td><?php echo htmlentities($row['date'])?></td>
                                                <td><?php echo htmlentities($row['views'])?></td>
                                                <td><a
                                                        href="editNews.php?pid=<?php echo htmlentities($row['id']);?>"><i
                                                            class="fa fa-pencil" style="color: #29b6f6;"></i></a>
                                                    &nbsp;<a
                                                        href="myNews.php?pid=<?php echo htmlentities($row['id']);?>&&action=del"
                                                        onclick="return confirm('Do you reaaly want to delete ?')"> <i
                                                            class="fa fa-trash-o" style="color: #f05050"></i></a> </td>
                                            </tr>
                                            </tr>
                                            <?php } }?>

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
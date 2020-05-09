<?php
session_start();
include('includes/config.php');

$message = '';
$error = '';
if (strlen($_SESSION['login']) == 0 || $_SESSION['user_roll'] !== 'admin') { 
    header('location:index.php');
}


else {
    if(isset($_POST['submit'])) {
        $categoryId = intval($_GET['catId']);
        $category = $_POST['category'];

        $query = "UPDATE categories SET name='$category' WHERE id='$categoryId'";
        $result = mysqli_query($con,$query);

        if($result)
            $message = "Category Updated successfully!";
        
        else
            $error = "Something went wrong! Please try again.";    
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Edit Category</title>

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
            <!-- content -->
            <div class="content">
                <div class="container">
                    
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Edit Category</h4>
                                <ol class="breadcrumb p-0 m-0"></ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <h4 class="m-t-0 header-title"><b>Edit Category </b></h4>
                                <hr />
                                <div class="row">
                                    <div class="col-sm-6">
                                        <?php 
                                        if($message){ 
                                            echo '<div class="alert alert-success" role="alert">';
                                            echo htmlentities($message);
                                            echo '</div>';
                                        }
                                        ?>
                                         <?php 
                                        if($error){ 
                                            echo '<div class="alert alert-success" role="alert">';
                                            echo htmlentities($error);
                                            echo '</div>';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <?php 
                                    $categoryId = intval($_GET['catId']);
                                    $query = "SELECT name FROM categories WHERE id = $categoryId";
                                    $result = mysqli_query($con,$query);

                                    while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <form class="form-horizontal" name="category" method="post">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Category</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control"
                                                        value="<?php echo htmlentities($row['name']);?>"
                                                        name="category" required>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">&nbsp;</label>
                                                <div class="col-md-10">
                                                    <button type="submit"
                                                        class="btn btn-custom waves-effect waves-light btn-md"
                                                        name="submit">
                                                        Update
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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

<?php
session_start();
include('includes/config.php');
$user_roll = htmlspecialchars($_SESSION['user_roll']);
if((strlen($_SESSION['login']) == 0))
{ 
    header('location:index.php');
}
elseif ($user_roll =='editor'){ 
    header('location:home.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add News</title>
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
                                <h4 class="page-title">Add News</h4>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="p-6">
                                <div class="">
                                    <form action="submitNews.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group m-b-20">
                                            <label for="exampleInputEmail1">Title</label>
                                            <input type="text" class="form-control" id="title" name="title"
                                                placeholder="Enter title" required maxlength="100">
                                        </div>
                                        <div class="form-group m-b-20">
                                            <label for="exampleInputEmail1">Category</label>
                                            <select class="form-control" name="category" id="category"
                                                onChange="getSubCat(this.value);" required>
                                                <option value="">Category </option>
                                                <?php
                                                //Fetching categories
                                                $query = "SELECT * FROM categories";
                                                $result = mysqli_query($con,$query);

                                                while ($category = mysqli_fetch_array($result))
                                                {    
                                                ?>
                                                <option value = "<?php echo htmlentities($category['name']);?>">
                                                    <?php echo htmlentities($category['name']);?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group m-b-20">
                                            <label for="exampleInputEmail1">Author's Name</label>
                                            <input type="text" class="form-control" id="author" name="author"
                                                placeholder="Enter name" required>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card-box">
                                                    <h4 class="m-b-30 m-t-0 header-title"><b>Content</b></h4>
                                                    <textarea class="summernote" name="content"
                                                        required maxlength="40000"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card-box">
                                                    <h4 class="m-b-30 m-t-0 header-title"><b>Image</b></h4>
                                                    <input type="file" class="form-control" id="newsImage"
                                                        name="newsImage" required>
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

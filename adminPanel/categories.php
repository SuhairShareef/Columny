<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
{ 
header('location:index.php');
}
elseif($_SESSION['login']!="admin"){
header('location:index.php');
}
    

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>categories</title>
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
                                <h4 class="page-title">Categories</h4>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <form method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="demo-box m-t-20">
                                    <div class="m-b-30">
                                        <a href="addCategory.php">
                                            <button id="addCategory" class="btn btn-primary waves-effect waves-light"
                                                type="submit" value="add" method="post">Add
                                                <i class="mdi mdi-plus-circle-outline"></i></button>
                                        </a>
                                        <a href="editCategory.php">
                                            <button id="editCategory" class="btn btn-success waves-effect waves-light"
                                                type="submit" value="edit" method="post">Edit</i></button>
                                        </a>
                                        <a href="deleteCategory.php">
                                            <button id="deleteCategory" class="btn btn-danger waves-effect waves-light"
                                                type="submit" value="delete" method="post">Delete</button>
                                        </a>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table m-0 table-colored-bordered table-bordered-primary">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>#</th>
                                                    <th>ID</th>
                                                    <th>Category Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                            $query = "SELECT categories.id as id, categories.name as name FROM categories";
                                            $result=mysqli_query($con,$query);
                                            $num=1;
                                            $rowNum=mysqli_num_rows($result);
                                            if($rowNum==0)
                                            {
                                            ?>
                                                <tr>
                                                    <td colspan="7" align="center">
                                                        <h3 style="color:red">No category found</h3>
                                                    </td>
                                                <tr>
                                                    <?php 
                                                } else {

                                                while($row=mysqli_fetch_array($result))
                                                {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                                id="checkedItem" name="defaultExampleRadios"
                                                                value="<?php echo htmlentities($row['id']);?>">
                                                        </div>
                                                    </td>
                                                    <td scope="row"><?php echo htmlentities($num);?></td>
                                                    <td><?php echo htmlentities($row['id']);?></td>
                                                    <td><?php echo htmlentities($row['name']);?></td>
                                                </tr>
                                                <?php $num++;}} ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
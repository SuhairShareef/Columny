<?php
session_start();

include('includes/config.php');
if (strlen($_SESSION['login']) == 0) { 
    header('location:index.php');
}

elseif ($_SESSION['user_roll'] != "admin") {
    header('location:index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Users</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/myStyle.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/css/deleteCategory.css">

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
                                <h4 class="page-title">Users</h4>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Add button -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="demo-box m-t-20">
                                <div class="m-b-30">
                                    <a href="addUser.php">
                                        <button id="addUser" class="btn btn-success waves-effect waves-light">Add
                                            <i class="mdi mdi-plus-circle-outline"></i></button>
                                    </a>
                                </div>

                                <div class="table-responsive">
                                    <table class="table m-0 table-colored-bordered table-bordered-primary">
                                        <thead>
                                            <tr>

                                                <th>#</th>
                                                <th>id</th>
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>email</th>
                                                <th>Roll</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $query = "SELECT users.id AS id, users.name AS name, users.username AS username, users.email AS email,users.roll AS roll from users WHERE id!='1'";
                                            $result = mysqli_query($con,$query);
                                            $num = 1;
                                            $rowNum = mysqli_num_rows($result);
                                            if ($rowNum == 0) {
                                            ?>
                                            <tr>
                                                <td colspan="7" align="center">
                                                    <h3 style="color:red">No user found</h3>
                                                </td>
                                            <tr>
                                                <?php 
                                                } 

                                                else {
                                                    while($row = mysqli_fetch_array($result))
                                                    {
                                                ?>
                                            <tr>
                                                <td scope="row"><?php echo htmlentities($num);?></td>
                                                <td><?php echo htmlentities($row['id']);?></td>
                                                <td><?php echo htmlentities($row['name']);?></td>
                                                <td><?php echo htmlentities($row['username']);?></td>
                                                <td><?php echo htmlentities($row['email']);?></td>
                                                <td><?php echo htmlentities($row['roll']);?></td>
                                                <td><a
                                                        href="editUser.php?userId=<?php echo htmlentities($row['id']);?>"><i
                                                            class="fa fa-pencil" style="color: #29b6f6;"></i></a>
                                                    &nbsp;<a href="#myModal<?php echo htmlentities($row['id']);?>"
                                                        data-toggle="modal">
                                                        <i class="fa fa-trash-o" style="color: #f05050"></i></a>
                                                    <!-- Delete Confirmation -->
                                                    <div id="myModal<?php echo htmlentities($row['id']);?>"
                                                        class="modal fade">
                                                        <div class="modal-dialog modal-confirm">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <div class="icon-box">
                                                                        <i class="material-icons">&#xE5CD;</i>
                                                                    </div>
                                                                    <h4 class="modal-title">Are you sure?</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal"
                                                                        aria-hidden="true">&times;</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to delete this
                                                                        user?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-info"
                                                                        data-dismiss="modal">Cancel</button>
                                                                    <a
                                                                        href="deleteUser.php?userId=<?php echo htmlentities($row['id']);?>"><button
                                                                            type="button"
                                                                            class="btn btn-danger">Delete</button></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php 
                                                $num++;}} 
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
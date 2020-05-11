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
        $userId = intval($_GET['userId']);
        $name = $_POST['name'];
        $password = $_POST['password'];
        $bdate = $_POST['bdate'];
        $roll = $_POST['roll'];

        $query = "UPDATE users SET name='$name',password='$password',birthdate='$bdate',roll='$roll' WHERE id='$userId'";
        $result = mysqli_query($con,$query);

        if($result)
            $message = "User Updated successfully!";
        
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
                                <h4 class="page-title">Edit User</h4>
                                <ol class="breadcrumb p-0 m-0"></ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <h4 class="m-t-0 header-title"><b>Edit User </b></h4>
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
                                            echo '<div class="alert alert-danger" role="alert">';
                                            echo htmlentities($error);
                                            echo '</div>';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <?php 
                                    $userId = intval($_GET['userId']);
                                    $query = "SELECT name,email,username,password,birthdate,roll FROM users WHERE id = $userId";
                                    $result = mysqli_query($con,$query);

                                    while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <form class="form-horizontal" name="category" method="post">
                                            
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Full Name</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control"
                                                        value="<?php echo htmlentities($row['name']);?>" name="name"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Email</label>
                                                <div class="col-md-10">
                                                    <input type="email" class="form-control "disabled
                                                        value="<?php echo htmlentities($row['email']);?>" name="email"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Username</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control "disabled
                                                        value="<?php echo htmlentities($row['username']);?>"
                                                        name="username" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Password</label>
                                                <div class="col-md-10">
                                                    <input type="password" class="form-control"
                                                        value="<?php echo htmlentities($row['password']);?>"
                                                        name="password" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Birthdate</label>
                                                <div class="col-md-10">
                                                    <input type="date" class="form-control"
                                                        value="<?php echo htmlentities($row['birthdate']);?>"
                                                        name="bdate" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 control-label">Roll</label>
                                                <div class="col-md-10">
                                                    <select class="form-control" name="roll" id="roll"
                                                        onChange="getSubCat(this.value);" required>
                                                        <option value="">Roll</option>
                                                        <?php
                                                         //Fetching rolls
                                                        $query = "SELECT roll FROM rolls WHERE id!='1'";
                                                        $result = mysqli_query($con,$query);

                                                        while ($roll = mysqli_fetch_array($result))
                                                        {    
                                                        ?>
                                                                <option value="<?php echo htmlentities($roll['roll']);?>">
                                                                <?php echo htmlentities($roll['roll']);?></option>
                                                        <?php } ?>
                                                    </select>
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
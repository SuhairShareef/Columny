<?php
session_start();
include("includes/config.php");
$_SESSION['login']=="";
session_unset();
session_destroy();

//Redirect to login page
header('location:index.php');
?>
<?php
require_once 'includes/config.php';

if(isset($_GET['link'])){
    $link = $_GET['link'];
    header("location:".$link);
}
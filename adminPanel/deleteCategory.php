<?php
session_start();
include('includes/config.php');

if (strlen($_SESSION['login']) == 0 || $_SESSION['user_roll'] !== 'admin') { 
    header('location:index.php');
}

else {
    if(isset($_GET['catId'])) {
        $categoryId = intval($_GET['catId']);

        $query = "DELETE FROM categories WHERE id='$categoryId'";
        $result = mysqli_query($con,$query);

        if(!$result)
            echo "<script>alert('Something went wrong. Please try again.');</script>"; 
        
        header('location:categories.php');         
    }
}
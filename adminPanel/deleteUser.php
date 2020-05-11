<?php
session_start();
include('includes/config.php');

if (strlen($_SESSION['login']) == 0 || $_SESSION['user_roll'] !== 'admin') { 
    header('location:index.php');
}

else {
    if(isset($_GET['userId'])) {
        $userId = intval($_GET['userId']);

        $query = "DELETE FROM users WHERE id='$userId'";
        $result = mysqli_query($con,$query);

        if(!$result)
            echo "<script>alert('Something went wrong. Please try again.');</script>"; 
        
        header('location:users.php');         
    }
}
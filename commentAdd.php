<?php
include('includes/config.php');

if(isset($_POST['submit']))
{
    if ((!empty($_POST['name'])) && (!empty($_POST['email'])) && (!empty($_POST['content'])) &&(!empty($_POST['id']))) { 
        
        $newsId = $_POST['id'];  
        $name = $_POST['name'];
        $email = $_POST['email'];
        $content = $_POST['content'];
        
        $query = "INSERT INTO comments(newsId,name,email,content,date) VALUES('$newsId','$name','$email','$content',NOW())";
        $result = mysqli_query($con,$query);

        if ($result) {
            $query = "UPDATE news SET comments = comments + 1 WHERE id = $newsId";
            $result = mysqli_query($con, $query);
            echo "<script>alert('comment successfully added !');</script>";
        }
        
        else
            echo "<script>alert('Something went wrong. Please try again.');</script>";  
          
    }
}
$id = $_POST['id'];
header('location:details.php?id='.$id);

?>
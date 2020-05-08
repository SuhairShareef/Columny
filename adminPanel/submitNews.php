<?php 
session_start();
include ('includes/config.php');

if (strlen($_SESSION['login'])) { 
    header('location:index.php');
}

else {
    if (isset($_POST['submit'])){
        $title = $_POST['title'];
        $category = $_POST['category'];
        $author = $_POST['author'];
        $content = $_POST['content'];
        
        //Checking the text size
        $contentMax = 40000;
        if (strlen($content) > $contentMax) {
            echo "<script>alert('The content size is too big!');</script>";
        }
        else {
            //Getting the uploaded image
            $newsImage = $_FILES["newsImage"]["name"];
            $newsImageTempName = $_FILES["newsImage"]["tmp_name"];
            $newsImageSize = $_FILES["newsImage"]["size"];
            $newsImageError = $_FILES["newsImage"]["error"];
            $newsImageType = $_FILES["newsImage"]["type"];

            $imgExt = explode('.', $newsImage);
            $imgActualExt = strtolower(end($imgExt));
            
            //Image types that are allowed in the website
            $allowedExtentions = array("jpg", "jpeg", "png");
            
            //Checking the image extention
            if (in_array($imgActualExt, $allowed_extensions)) {
                //Checking for errors in upload 
                if ($newsImageError === 0) {
                    //Checking for image size
                    if ($newsImageSize < 1000000) {
                        $newsImageNewName = uniqid('', true).".".$imgActualExt;
                        $imgDestination = '../assets/img/uploads/'.$newsImageNewName;
                        $imgThumb = '../assets/img/uploads/thumbnails/'.$newsImageNewName;
                        move_uploaded_file($newsImageTempName, $imgDestination);

                        $query = "INSERT INTO news(title, content, img, thumbnail, author, date, feature, approve, category) 
                                VALUES('$title', '$content', $imgDestination, '$imgThumb', '$author', NOW(), '0', '0', '$category')";
                        $result = mysqli_query($con,$query);

                        if($result) {
                            header('location:home.php');
                            echo "<script>alert('Article added successfully');</script>";
                        }

                        else {
                            echo "<script>alert('Something went wrong. Please try again.');</script>";  
                        }
                    }
                    else {
                        echo "<script>alert('Your image is too big!');</script>";
                    }
                }
                else {
                    echo "<script>alert('There was an error uploading your image!');</script>";
                }
            }
            else {
                echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
            }
        }
    } 
    header('location:home.php');
}

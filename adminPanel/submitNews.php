<?php 
session_start();
include ('includes/config.php');

if (strlen($_SESSION['login']) == 0) { 
    header('location:index.php');
}

else {
    if (isset($_POST['submit'])){
        $title = $_POST['title'];
        $category = $_POST['category'];
        $author = $_SESSION['name'];
        $author_id = $_SESSION['user_id'];
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
            if (in_array($imgActualExt, $allowedExtentions)) {
                //Checking for errors in upload 
                if ($newsImageError === 0) {
                    //Checking for image size
                    if ($newsImageSize < 1000000) {
                        $newsImageNewName = uniqid('', true).".".$imgActualExt;
                        $imgDestination = '../assets/img/uploads/'.$newsImageNewName;
                        $imgThumb = '../assets/img/uploads/thumbnails/'.$newsImageNewName;
                        move_uploaded_file($newsImageTempName, $imgDestination);

                        // Creating thumbnail for the inserted image 
                        // Load image and get image size
                        $img = imagecreatefromjpeg( "{$imgDestination}" );
                        $width = imagesx( $img );
                        $height = imagesy( $img );
                        $thumbWidth = 200;

                        // Calculate thumbnail size
                        $new_width = $thumbWidth;
                        $new_height = floor( $height * ( $thumbWidth / $width ) );

                        // Create a new temporary image
                        $tmp_img = imagecreatetruecolor( $new_width, $new_height );

                        // Copy and resize old image into new image
                        imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );

                        // Save thumbnail into a file
                        imagejpeg( $tmp_img, "{$imgThumb}" );
                        $imgDestination = 'assets/img/uploads/'.$newsImageNewName;
                        $imgThumb = 'assets/img/uploads/thumbnails/'.$newsImageNewName;

                        $query = "INSERT INTO news(title, content, img, thumbnail, author_id, date, feature, approve, category) 
                                VALUES('$title', '$content', '$imgDestination', '$imgThumb', '$author_id', NOW(), '0', '0', '$category')";
                        $result = mysqli_query($con,$query);

                        if($result) {
                            header('location:home.php');
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
                echo "<script>alert('Invalid format. Only jpg / jpeg/ png format allowed');</script>";
            }
        }
    } 
    
}
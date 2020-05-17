<?php
require_once 'includes/config.php';

$query = "SELECT * FROM ads WHERE position = 'Top'";
$result = mysqli_query($con, $query);
$num = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
$current = time();
if ($num >= 1) {
    
    $link = $row['link'];
    $img = $row['img'];
    echo '<a href="direct.php?link='.$link.'"><img class="img-fluid ad1" style="padding:10px" id="ad1" src="'.$img.'" alt=""></a>';

}



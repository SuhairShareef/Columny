<div class="suggestions col-md-4 h-100">
    <div class="row">
        <img class="col-md-12 live" src="assets/img/live.png" alt="">
    </div>
    <div id="Left" class="row">
        <img class="col-md-12 ad2" src="assets/img/ad3.png" alt="">
    </div>
    <div class="row most-title">
        الأكثر تعليقاً
    </div>
    <div class="row most-commented">
        <?php
            //Latset news fetching 
            $query ="SELECT id, title, thumbnail FROM news ORDER BY comments DESC LIMIT 2";
            $result = mysqli_query($con, $query);

            if (mysqli_num_rows ($result) >= 1){
            $mostCommented = mysqli_fetch_array($result);
            }

            else {
                echo "Can't find latest news!";
            }

            $count = mysqli_num_rows($result);
            while ($count > 0) {

                echo '<a href="details.php?id='.$mostCommented['id'].'"'.' class="row recent h-50">';
                echo '<img class="col-md-4 most-commented-img img-fluid" '.' src="'.$mostCommented['thumbnail'].'">';
                echo '<div class="title side-nav my-auto col-md-8">'.htmlentities($mostCommented['title']).'</div></a><hr>';
                $mostCommented = mysqli_fetch_array($result);
                $count--;
            }         
        ?>
    </div>
    <div class="row most-title most-viewed">
        الأكثر مشاهدة
    </div>
    <div class="row most-commented most-viewed-section">
    <?php
            //Latset news fetching 
            $query ="SELECT id, title, thumbnail FROM news ORDER BY views DESC LIMIT 2";
            $result = mysqli_query($con, $query);

            if (mysqli_num_rows ($result) >= 1){
            $mostViewed = mysqli_fetch_array($result);
            }

            else {
                echo "Can't find latest news!";
            }

            $count = mysqli_num_rows($result);
            while ($count > 0) {

                echo '<a href="details.php?id='.$mostViewed['id'].'"'.' class="row recent h-50">';
                echo '<img class="col-md-4 most-commented-img img-fluid" '.' src="'.$mostViewed['thumbnail'].'">';
                echo '<div class="title side-nav my-auto col-md-8">'.htmlentities($mostViewed['title']).'</div></a><hr>';
                $mostViewed = mysqli_fetch_array($result);
                $count--;
            }         
        ?>
    </div>
</div>
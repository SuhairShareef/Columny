<div class="row" style="height:fit-content">
    <nav class="navbar navbar-expand-lg navbar-light bg-light col-md-12">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="home.phpnavbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-right">
                <li class="nav-item active">
                    <a class="nav-link pull-right" href="home.php">الرئيسية<span class="sr-only">(current)</span></a>
                </li>
                <?php 
                $query = "SELECT name ,id FROM categories";
                $result = mysqli_query($con, $query);
                
                if (mysqli_num_rows($result) != 0){
                    $numOfCategories = mysqli_num_rows($result);
                    $category = mysqli_fetch_array($result);

                    for($i = 0; $i<$numOfCategories; $i++){
                        echo '<li class="nav-item ">
                        <a class="nav-link disabled" href="category.php?'.htmlentities($category['id']).'">'.htmlentities($category['name']).'</a></li>';
                        $category = mysqli_fetch_array($result);
                    }
                
                }
                else{
                    echo "Can't find featured news!";
                }
                ?>
            </ul>
            <form class="form-inline mr-auto my-2 my-lg-0">
                <input disabled class="form-control mr-sm-2" type="search" placeholder="البحث" aria-label="Search">
            </form>
        </div>
    </nav>
</div>
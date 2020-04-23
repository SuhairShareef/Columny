
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">Navigation</li>
                <li class="has_sub">
                    <a href="home.php" class="waves-effect"><i class="mdi mdi-view-dashboard"></i>
                        <span> Home </span> </a>
                </li>
                <li class="has_sub">
                    <a href="Categories.php" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i>
                        <span> Categories </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="add-category.php">Add Category</a></li>
                        <li><a href="manage-categories.php">Manage Category</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="users.php" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i>
                        <span> Users </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="add-post.php">Add Posts</a></li>
                        <li><a href="manage-posts.php">Manage Posts</a></li>
                        <li><a href="trash-posts.php">Trash Posts</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="addNews.php" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i>
                        <span> Add news </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="aboutus.php">About us</a></li>
                        <li><a href="contactus.php">Contact us</a></li>
                    </ul>
                </li>
                <li class="has_sub"<?php
                if($_SESSION['login']!="admin")
                { 
                    echo"diplay = 'none'";
                }
                ?>>
                    <a href="approve.php" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i>
                        <span> Approve </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="unapprove-comment.php">Waiting for Approval </a></li>
                        <li><a href="manage-comments.php">Approved Comments</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">Navigation</li>
                <li class="has_sub">
                    <a href="home.php" class="waves-effect"><i class="mdi mdi-home"></i>
                        <span> Home </span> </a>
                </li>
                <li class="has_sub">
                    <a href="Categories.php" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i>
                        <span> Categories </span></a>
                </li>
                <li class="has_sub">
                    <a href="users.php" class="waves-effect"><i class="mdi mdi-account-multiple"></i>
                        <span> Users </span></a>
                </li>
                <li class="has_sub">
                    <a href="addNews.php" class="waves-effect"><i class="mdi mdi-pencil-box"></i>
                        <span> Add news </span></a>
                </li>
                <li class="has_sub"<?php if($_SESSION['login']!="admin"){echo "diplay = 'none'";}?>>
                    <a href="approve.php" class="waves-effect"><i class="mdi mdi-marker-check"></i>
                        <span> Approve </span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
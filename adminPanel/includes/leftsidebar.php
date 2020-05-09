<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">Navigation</li>
                <li class="has_sub">
                    <a href="home.php" class="waves-effect"><i class="mdi mdi-home"></i>
                        <span> Home </span> </a>
                </li>
                <?php 
                if ($_SESSION['user_roll'] == "admin")
                include('lsb-adminView.php');
            
                else if ($_SESSION['user_roll'] == "editor")
                include('lsb-editorView.php');
                
                else if ($_SESSION['user_roll'] == "author")
                include('lsb-authorView.php');
                ?>
            </ul>
        </div>
    </div>
</div>
<!-- Menu du site -->

<div class="sticky-top">
    <div class="nav-icon"></div>

    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="index.php"><img src="<?= PATH_CORE.'logo.svg'?>" id="logo-header"></a>
        <!-- burger menu mobile and medium -->
        <div class="button-menu">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <?php
        if(isset($_SESSION['user']) && ($_SESSION['user']->getProfile() == "Administrateur" || $_SESSION['user']->getProfile() == "Moderateur")){
            ?>
            <div class="adminTools">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle  " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="worlwide"></span>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#"><i></i> Fr</a>
                    <a class="dropdown-item" href="#"><i></i> En</a>
                </div>
            </div>
            <?php
                if($_SESSION['user']->getProfile() == "Administrateur") {
            ?>
                <a class="btn disconnect"  href="?page=administration" title="<?= TITRE_ADMINISTRATION?>">
                    <svg class="admin"></svg>
                </a>
                <?php
                    }
                ?>    
                <a class="btn disconnect"  href="?page=deconnexion" title="<?= MENU_DECONNEXION ?>">
                    <svg class="logout"></svg>
                </a>
            </div>
            <?php
        }
        ?>
        <!-- Navbar -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav row">
            <!-- Navbar items -->
                <li class="nav-item">
                    <a class="nav-link" href="?page=accueil"><?= MENU_ACCUEIL ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=terreaux"><?= MENU_TERREAUX ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=bellecour"><?= MENU_BELLECOUR ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=perrache"><?= MENU_PERRACHE ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=forum"><?= MENU_FORUM ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=contact"><?= MENU_CONTACT ?></a>
                </li>
            </ul>
        </div>
    </nav>
</div>

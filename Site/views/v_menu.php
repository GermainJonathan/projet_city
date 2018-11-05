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
            <?php
                if(isset($_SESSION['user']) && $_SESSION['user'] == "Administrateur"){
                    ?>
                    <div class="nav-item">
                        <a class="nav-link" href="?page=deconnexion"><?= MENU_DECONNEXION ?></a>
                    </div>
                    <?php
                }
                ?>
        </div>
    </nav>
</div>

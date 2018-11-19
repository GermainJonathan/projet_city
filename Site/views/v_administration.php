<?php

// En tête de page
require_once(PATH_VIEWS.'header.php');

// menu navigation
require_once(PATH_VIEWS.'alert.php');?>

<div class="bodyForum container">
    <table  class="table table-hover table-striped">
        <thead>
        <tr>
            <th scope="col"><?= TITRE_ADMIN_NOM ?></th>
            <th scope="col"><?= TITRE_ADMIN_MAIL ?></th>
            <th scope="col"><?= TITRE_ADMIN_PROFILE ?></th>
            <th scope="col"><?= TITRE_ACTION ?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($listUser as $user){
            ?>
            <tr>
                <td data-label=<?= '"'.TITRE_ADMIN_NOM.'"' ?>><?=$user->getNom()?></td>
                <td data-label=<?= '"'.TITRE_ADMIN_MAIL.'"' ?>><?=$user->getMail()?></td>
                <td data-label=<?= '"'.TITRE_ADMIN_PROFILE.'"' ?>><?=$user->getProfile()?></td>
                <td data-label=<?= '"'.TITRE_ACTION.'"' ?>><?= ($user->getCodeUser() != $_SESSION['user']->getCodeUser()) ? '<button class="btn col-2 btn-danger">X</button>' : '' ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
<div class="container-fluid">
    <nav id="pageSelector" class="nav nav-pills nav-justified">
        <a class="nav-item nav-link active" data-index="0" href="#"><?= MENU_ACCUEIL ?></a>
        <a class="nav-item nav-link" data-index="1" href="#"><?= MENU_TERREAUX ?></a>
        <a class="nav-item nav-link" data-index="2" href="#"><?= MENU_BELLECOUR ?></a>
        <a class="nav-item nav-link" data-index="3" href="#"><?= MENU_PERRACHE ?></a>
        <a class="nav-item nav-link" data-index="4" href="#"><?= MENU_CONTACT ?></a>
    </nav>
    <hr>
    <div class="adminContainer">
        <?php include(PATH_VIEWS.'spinner.php'); ?>
        <div id="content" class="row">
            <div class="align-self-center col-3">
                <div class="sidebarAdmin nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#" role="tab" aria-selected="true"><?= TITRE_HISTOIRE ?></a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#" role="tab" aria-selected="false"><?= TITRE_MONUMENT ?></a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#" role="tab" aria-selected="false"><?= TITRE_ACTIVITE ?></a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#" role="tab" aria-selected="false"><?= TITRE_RESTAURANT ?></a>
                </div>
            </div>
            <div class="contentAdmin col-9">
                <?php include(PATH_VIEWS.'spinner.php'); ?>
            </div>
        </div>
    </div>
    <hr>
</div>
<script type="text/javascript" src="<?= PATH_SCRIPTS ?>admin.js"></script>
<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');

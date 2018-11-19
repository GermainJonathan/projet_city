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
        <a class="nav-item nav-link active" href="#"><?= MENU_ACCUEIL ?></a>
        <a class="nav-item nav-link" href="#"><?= MENU_PERRACHE ?></a>
        <a class="nav-item nav-link" href="#"><?= MENU_BELLECOUR ?></a>
        <a class="nav-item nav-link" href="#"><?= MENU_TERREAUX ?></a>
        <a class="nav-item nav-link" href="#"><?= MENU_CONTACT ?></a>
    </nav>
    <hr>
    <div class="adminContainer row">
        <div class="align-self-center col-3">
            <div class="sidebarAdmin nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
            </div>
        </div>
        <div class="contentAdmin col-9">
        </div>
    </div>
    <hr>
</div>
<script type="text/javascript" src="<?= PATH_SCRIPTS ?>admin.js"></script>
<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');

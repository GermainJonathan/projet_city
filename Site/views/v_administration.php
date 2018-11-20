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
                </div>
            </div>
            <div class="contentAdmin col-9">
                <?php include(PATH_VIEWS.'spinner.php'); ?>
                <div class="patrimoineComponent form-group">
                    <div class="media">
                        <div class="relative">
                            <img src="<?=PATH_LOGO?>" class="border imgAdmin img-thumbnail img-fluid rounded align-self-center shadow" alt="">
                            <input type="file" id="file1" class="custom-file custom-file-input" capture style="display: none;">
                            <button type="file" id="upfile1" class="btn btn-light plus-sign"><img class="plus"></button>
                        </div>
                        <div class="media-body align-self-center">
                            <div class="form-inline">
                                <label class="col-2 align-self-left" for="title"><h4 class="text-truncate">Titre</h4></label>
                                <input type="text" class="form-control col-8" id="title">
                            </div>
                            <div class="form-inline">
                                <label class="col-2 align-self-left" for="description"><h4 class="text-truncate">Description</h4></label>
                                <textarea class="form-control  col-8" id="description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <button type="button" class="btn btn-primary">Enregistrer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
</div>
<script type="text/javascript" src="<?= PATH_SCRIPTS ?>admin.js"></script>
<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');

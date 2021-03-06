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
        <a class="nav-item nav-link active" data-index="1" href="#"><?= MENU_TERREAUX ?></a>
        <a class="nav-item nav-link" data-index="2" href="#"><?= MENU_BELLECOUR ?></a>
        <a class="nav-item nav-link" data-index="3" href="#"><?= MENU_PERRACHE ?></a>
        <a class="nav-item nav-link" data-index="4" href="#"><?= MENU_ADMINISTRATION ?></a>
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
                <div id="patrimoineConfig">
                    <div id="patrimoineContent">
                        <form class="media" id="0" style="display: none;">
                            <input name="id" type="text" class="form-control" id="id" hidden>
                            <div class="relative">
                                <img src="<?=PATH_LOGO?>" class="border imgAdmin img-thumbnail img-fluid rounded align-self-center shadow" alt="">
                                <input name="image" type="file" id="file" class="custom-file custom-file-input" capture style="display: none;" onchange="upload(this, $(this).prev());">
                                <button id="upfile" type="button" class="btn btn-light plus-sign" onClick="fileBrowser($(this).prev());"><img class="plus"></button>
                            </div>
                            <div class="media-body align-self-center">
                                <div class="form-inline" data-id='0'>
                                    <label class="col-2 align-self-left" for="title"><h4 class="text-truncate">Titre</h4></label>
                                    <input name="titre" type="text" class="form-control col-8" id="title">
                                </div>
                                <div class="form-inline" data-id='10'>
                                    <label class="col-2 align-self-left" for="description"><h4 class="text-truncate">Description</h4></label>
                                    <textarea name="description" class="form-control  col-8" id="description"></textarea>
                                </div>
                            </div>
                            <button type="button" class="btn btn-outline-danger align-self-center mr-4" onClick="openModal($(this).parent().find('input#id').val());"><span class="bin"></span></button>
                        </form>   
                    </div>                 
                    <div class="row justify-content-center mt-4 mb-4">
                        <button type="button" class="btn btn-primary mr-4" id="add" onClick="addPatrimoineComponents({}, false);"><?= AJOUTER ?></button>
                        <button type="button" class="btn btn-primary mr-4" onClick="savePatrimoine();">Enregistrer</button>
                        <a class="btn btn-primary" href="?page=administration">Annuler</a>
                    </div>
                </div>
                <div id="administrationConfig" style="display: none;">
                    <div id="sidebarData">
                        <?php
                            foreach($listMessage as $message) {
                            ?>
                                <input type="text" value="<?=$message->getNom() . ' ' . $message->getPrenom() . ' [' . $message->getObjet() . ']'?>" data-idMessage="<?=$message->getCodeMessage()?>" hidden>
                            <?php
                            }
                        ?>
                    </div>
                    <div id="mailContent" class="container">
                        <?php
                            foreach($listMessage as $message) {
                            ?>
                                <div id="<?=$message->getCodeMessage()?>" style="display: none;">
                                    <div>
                                        <pre>---- From: <?=$message->getNom(). ' ' .$message->getPrenom()?> <?=$message->getMail()?> - Object: [<?=$message->getObjet()?>] ----</pre>
                                    </div>
                                    <div class="mailMessage">
                                        <pre><?=$message->getMessage()?></pre>
                                    </div>
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
</div>
<!-- Modal -->
<div class="modal fade" id="adminModal" tabindex="-1" role="dialog" aria-labelledby="adminModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="adminModalTitle"><?= DELETE_CONFIRM ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input id="idModal" type="text" class="form-control" hidden>
                <p><?= TEXT_CONFIRM_DELETE ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= CANCEL ?></button>
                <button type="button" class="btn btn-primary" onClick="deleteObject($('#adminModal').find('input#idModal').val());"><?= CONTINUER ?></button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Mail -->
<div class="modal fade" id="adminModalMail" tabindex="-1" role="dialog" aria-labelledby="adminModalMailTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="adminModalMailTitle">Delete confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input id="idModal" type="text" class="form-control" hidden>
                <p>Are you sure to delete this message ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onClick="deleteObject($('#adminModalMail').find('input#idModal').val());">Continue</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= PATH_SCRIPTS ?>admin.js"></script>
<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');

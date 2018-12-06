<?php

// En tête de page
require_once(PATH_VIEWS.'header.php');

// menu navigation
require_once(PATH_VIEWS.'alert.php');?>
<div class="bodyForum container" id="topicBody">
    <h3 class="contact-title" id="titreTopic"><?= $topic->getTitre() ?></h3>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col" style="width: 15%;"><?= TITRE_COMM_NOM ?></th>
                <th><?= TITRE_MESSAGE ?></th>
                <th style="width: 15%;"><?= TITRE_DATE ?></th>
                <?php
                    if (isset($_SESSION['user']) && ($_SESSION['user']->getProfile() == "Administrateur" || $_SESSION['user']->getProfile() == "Moderateur")) {
                        ?>
                        <th><?= TITRE_ACTION ?></th>
                        <?php
                    }
                    ?>
            </tr>
        </thead>
        <tbody id="messageTopic">
            <?php
            foreach ($listMessage as $message) {
                ?>
                <tr>
                    <td data-label=<?= '"'.TITRE_COMM_NOM.'"' ?>><?= $message->getNom().($message->getProfile() != 'Administrateur' ? "" : " ★") ?></td>
                    <td data-label=<?= '"'.TITRE_MESSAGE.'"' ?>><?= $message->getMessage() ?></td>
                    <td data-label=<?= '"'.TITRE_DATE.'"' ?>><?= $message->getDate() ?></td>
                    <?php
                    if (isset($_SESSION['user']) && ($_SESSION['user']->getProfile() == "Administrateur" || $_SESSION['user']->getProfile() == "Moderateur")) {
                        ?>
                        <td data-label=<?= '"'.TITRE_ACTION.'"' ?>><button class="btn btn-danger" id="<?=$message->getIdMessage()?>" onClick="deleteMessage($(this));">X</button></td>
                        <?php
                    }
                    ?>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <div>
        <form name="formTopic" id="formTopic" class="mt-4">
            <div class="form-group" <?= (isset($_SESSION['user']) && $_SESSION['user']->getCodeProfile() != 0) ? "hidden" : "" ?>>
                <input class="form-control" type="text" name="nomTopic" placeholder="<?= TXT_COMM_NOM ?>" id="nomTopic" value="<?= (isset($_SESSION['user'])) ? $_SESSION['user']->getNom() : "" ?>"/>
            </div>
            <div class="form-group">
                <textarea name="messageTopic" id="messageTopic" class="form-control" placeholder="<?= TITRE_MESSAGE ?>"></textarea>
            </div>
            <button type="button" form="formTopic" name="valFormTopic" class="btn btn-primary" onClick="sendMessage(<?= $topic->getId() ?>);"><?= TXT_ENVOYER ?></button>
        </form>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="messageModalTitle"><?= DELETE_CONFIRM ?></h5>
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
                <button type="button" class="btn btn-primary" onClick="confirmDelete($('#messageModal').find('input#idModal').val());"><?= CONTINUER ?></button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= PATH_SCRIPTS ?>topic.js"></script>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');

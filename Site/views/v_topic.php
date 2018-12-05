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
                <th><?= TITRE_DATE ?></th>
                <th><?= TITRE_COMM_NOM ?></th>
                <th scope="col"><?= TITRE_MESSAGE ?></th>
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
            <tr>
                <?php
                foreach ($listMessage as $message) {
                    ?>
                    <td data-label=<?= '"'.TITRE_DATE.'"' ?>><?= $message->getDate() ?></td>
                    <td data-label=<?= '"'.TITRE_COMM_NOM.'"' ?>><?= $message->getNom().($message->getProfile() != 'User')? "" : " ★" ?></td>
                    <td data-label=<?= '"'.TITRE_MESSAGE.'"' ?>><?= $message->getMessage() ?></td>
                    <?php
                    if (isset($_SESSION['user']) && ($_SESSION['user']->getProfile() == "Administrateur" || $_SESSION['user']->getProfile() == "Moderateur")) {
                        ?>
                        <td data-label=<?= '"'.TITRE_ACTION.'"' ?>><button class="btn btn-danger">X</button></td>
                        <?php
                    }
                }
                ?>
            </tr>
        </tbody>
    </table>
    <?php
        if (empty($_SESSION['user']) || $_SESSION['user']->getCodeProfile() == 0){
    ?>
    <div>
        <form name="formTopic" id="formTopic" class="mt-4">
            <div class="form-group">
                <input class="form-control" type="text" name="nomTopic" placeholder="<?= TXT_COMM_NOM ?>" id="nomTopic" value="<?= (isset($_SESSION['user']) && $_SESSION['user']->getCodeProfile() == 0) ? $_SESSION['user']->getNom() : "" ?>"/>
            </div>
            <div class="form-group">
                <textarea name="messageTopic" id="messageTopic" class="form-control" placeholder="<?= TITRE_MESSAGE ?>"></textarea>
            </div>
            <button type="button" form="formTopic" name="valFormTopic" class="btn btn-primary" onClick="sendMessage(<?= $topic->getId() ?>);"><?= TXT_ENVOYER ?></button>
        </form>
    </div>
    <?php
        }
    ?>
</div>
<script type="text/javascript" src="<?= PATH_SCRIPTS ?>topic.js"></script>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');

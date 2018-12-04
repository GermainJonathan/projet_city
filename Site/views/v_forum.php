<?php

// En tête de page
require_once(PATH_VIEWS.'header.php');

// menu navigation
require_once(PATH_VIEWS.'alert.php');?>
<div class="bodyForum container">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col"><?= TITRE_DATE ?></th>
                <th scope="col"><?= TITRE_TOPIC ?></th>
                <?php
                    if(isset($_SESSION['user']) && ($_SESSION['user']->getProfile() == "Administrateur" || $_SESSION['user']->getProfile() == "Moderateur")) {
                ?>
                <th scope="col"><?= TITRE_ETATA_TOPIC ?></th>
                <th scope="col"><?= TITRE_ACTION ?></th>
                <?php
                    }
                ?>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($listTopic as $topic) {
                if(isset($_SESSION['user']) && ($_SESSION['user']->getProfile() == "Administrateur" || $_SESSION['user']->getProfile() == "Moderateur")){
        ?>
            <tr>
                <td data-label=<?= '"'.TITRE_DATE.'"' ?>><?= dateBaseToSite($topic->getDate()) ?></td>
                <td data-label=<?= '"'.TITRE_TOPIC.'"' ?>><a class="list-group-item list-group-item-action" href="?page=topic&topic=<?= $topic->getId() ?>"><?= $topic->getTitre() ?></a></td>
                <td data-label=<?= '"'.TITRE_ETATA_TOPIC.'"' ?>><?= $topic->getEtat() ?></td>
                <td data-label=<?= '"'.TITRE_ACTION.'"' ?>>
                    <button id="<?= $topic->getId() ?>" class="btn col-5 btn-outline-success btnForumAdmin" value="<?= $topic->getCodeActionValid() ?>"><?= $topic->getActionValid() ?></button>
                    <button id="<?= $topic->getId() ?>" class="btn col-5 btn-outline-danger btnForumAdmin" value="<?= $topic->getCodeActionRefuse() ?>"><?= $topic->getActionRefuse() ?></button>
                </td>
        <?php
            } else {            
        ?>
            </tr>
                <?php
                    if ($topic->getCodeEtat() != 3 && $topic->getCodeEtat() != 5){
                ?>
                <tr>
                    <td data-label=<?= '"'.TITRE_DATE.'"' ?>><?= dateBaseToSite($topic->getDate()) ?></td>
                    <td data-label=<?= '"'.TITRE_TOPIC.'"' ?>><a class="list-group-item list-group-item-action" href="?page=topic&topic=<?= $topic->getId() ?>"><?= $topic->getTitre() ?></a></td>
                    <?php 
                        if ($topic->getCodeEtat() == 4){
                    ?>
                    <td><img class="imgResoluForum" src="assets/images/core/check.svg"/></td>
                </tr>
                    <?php
                        }
                    ?>
            <?php
                    }
                }
            }
            ?>
        </tbody>
    </table>
    <?php
        if (empty($_SESSION['user'])){
    ?>
    <div>
        <form name="formTopic" id="formTopic">
            <div class="form-group">
                <input class="form-control" type="text" name="titreTopic" placeholder="<?= TXT_TITRE_TOPIC ?>" id="titreTopic" value="<?= (isset($_POST['titreTopic'])) ? $_POST['titreTopic'] : "" ?>"/>
            </div>
            <div class="form-group">
                <textarea name="descriptionTopic" id="descriptionTopic" class="form-control" placeholder="<?= TXT_TITRE_DESCRIPTION ?>"></textarea>
            </div>
            <button type="button" form="formTopic" name="valFormTopic" class="btn btn-primary" onClick="sendTopic();"><?= TXT_ENVOYER ?></button>
        </form>
    </div>
    <?php
        }
    ?>
</div>
<script type="text/javascript" src="<?= PATH_SCRIPTS ?>forum.js"></script>
<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');

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
            ?>
                <tr>
                    <td><?= dateBaseToSite($topic->getDate()) ?></td>
                    <td><a class="list-group-item list-group-item-action" href="?page=topic&topic=<?= $topic->getId() ?>"><?= $topic->getTitre() ?></a></td>
                    <?php
                    if(isset($_SESSION['user']) && ($_SESSION['user']->getProfile() == "Administrateur" || $_SESSION['user']->getProfile() == "Moderateur")){
                        ?>
                        <td><?= $topic->getEtat() ?></td>
                        <td>
                            <button id="<?= $topic->getId() ?>" class="btn col-5 btn-success" value="<?= $topic->getCodeActionValid() ?>"><?= $topic->getActionValid() ?></button>
                            <button id="<?= $topic->getId() ?>" class="btn col-5 btn-danger" value="<?= $topic->getCodeActionRefuse() ?>"><?= $topic->getActionRefuse() ?></button>
                        </td>
                        <?php
                    }
                    ?>
                </tr>
            
            <?php
        }
        ?>
        </tbody>
    </table>
    <?php
        if (empty($_SESSION['user'])){
            ?>
            <div>
                <form action="" name="formTopic" id="formTopic" method="post">
                    <div class="form-group">
                        <label for="titreTopic"><?= TXT_TITRE_TOPIC ?></label>
                        <input class="form-control" type="text" name="titreTopic" id="titreTopic" value="<?= (isset($_POST['titreTopic'])) ? $_POST['titreTopic'] : "" ?>"/>
                    </div>
                    <div class="form-group">
                        <textarea name="descriptionTopic" id="descriptionTopic" class="form-control" placeholder="<?= TXT_TITRE_DESCRIPTION ?>"></textarea>
                    </div>
                    <button type="submit" form="formTopic" name="valFormTopic" class="btn btn-primary"><?= TXT_ENVOYER ?></button>
                </form>
            </div>
            <?php
        }
    ?>
</div>
<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');

<?php

// En tête de page
require_once(PATH_VIEWS.'header.php');

// menu navigation
require_once(PATH_VIEWS.'alert.php');?>
<div class="bodyForum">
    <table  class="table">
        <thead>
            <tr>
                <th><?= TITRE_DATE ?></th>
                <th><?= TITRE_TOPIC ?></th>
                <?php
                if(isset($_SESSION['user']) && ($_SESSION['user']->getProfile() == "Administrateur" || $_SESSION['user']->getProfile() == "Moderateur")) {
                    ?>
                    <th><?= TITRE_ETATA_TOPIC ?></th>
                    <th><?= TITRE_ACTION ?></th>
                    <?php
                }
                ?>
            </tr>
        </thead>
        <?php

        foreach ($listTopic as $topic) {
            ?>
            <tbody>
                <tr>
                    <td><?= dateBaseToSite($topic->getDate()) ?></td>
                    <td><a href="?page=topic&topic=<?= $topic->getId() ?>"><?= $topic->getTitre() ?></a></td>
                    <?php
                    if(isset($_SESSION['user']) && ($_SESSION['user']->getProfile() == "Administrateur" || $_SESSION['user']->getProfile() == "Moderateur")){
                        ?>
                        <td><?= $topic->getEtat() ?></td>
                        <td>
                            <?php
                            switch ($topic->getCodeEtat()) {

                                case 1:
                                    ?>
                                    <button class="btn btn-success">Valider</button>
                                    <button class="btn btn-danger">Refuser</button>
                                    <?php
                                    break;
                                case 2:
                                    ?>
                                    <button class="btn btn-success">Résolu</button>
                                    <button class="btn btn-danger">Annuler</button>
                                    <?php
                                    break;
                                case 3:
                                    ?>
                                    <button class="btn btn-success">Valider</button>
                                    <button class="btn btn-danger">Supprimer</button>
                                    <?php
                                    break;

                            }
                            ?>
                        </td>
                        <?php
                    }
                    ?>
                </tr>
            </tbody>
            <?php
        }

        ?>
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

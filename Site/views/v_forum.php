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
            </tr>
        </thead>
        <?php

        foreach ($listTopic as $topic) {
            ?>
            <tbody>
                <tr>
                    <td><?= dateBaseToSite($topic->getDate()) ?></td>
                    <td><a href="?page=topic&topic=<?= $topic->getId() ?>"><?= $topic->getTitre() ?></a></td>
                </tr>
            </tbody>
            <?php
        }

        ?>
    </table>
    <div>
        <form action="" name="formTopic" id="formTopic" method="post">
            <div class="form-group">
                <label for="titreTopic"><?= TXT_TITRE_TOPIC ?></label>
                <input class="form-control" type="text" name="titreTopic" id="titreTopic" value="<?= (isset($_POST['titreTopic'])) ? $_POST['titreTopic'] : "" ?>"/>
            </div>
            <div class="form-group">
                <textarea name="descriptionTopic" id="descriptionTopic" class="form-control" placeholder="<?= TXT_TITRE_DESCRIPTION ?>"></textarea>
            </div>
            <button type="submit" form="formTopic" name="valFormTopic" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
</div>
<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');

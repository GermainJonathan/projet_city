<?php

// En tête de page
require_once(PATH_VIEWS.'header.php');

// menu navigation
require_once(PATH_VIEWS.'alert.php');?>
<br>
<br>
<br>
<br>
<br>
<br>
<table>
    <thead>
        <tr>
            <th><?= TITRE_DATE ?></th>
            <th><?= TITRE_TOPIC ?></th>
            <?php
            if($_SESSION['user'] != "Administrateur"){
                ?>
                <th><?= TITRE_ETATA_TOPIC ?></th>
                <th><?= TITRE_ACTION_TOPIC ?></th>
                <?php
            }
            ?>
        </tr>
    </thead>
    <?php

    foreach ($listTopic as $topic){
        ?>
        <tbody>
            <tr>
                <td><?= dateBaseToSite($topic->getDate()) ?></td>
                <td><a href="?page=topic&topic=<?= $topic->getId() ?>"><?= $topic->getTitre() ?></a></td>
                <?php
                if($_SESSION['user'] != "Administrateur"){
                    ?>
                    <td><?= $topic->getEtat() ?></td>
                    <td><button class="btn btn-primary">Ca passe</button><button class="btn btn-danger">Ca passe pas</button></td>
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
if($_SESSION['user'] != "Administrateur") {
    ?>
    <div>
        <form action="" name="formTopic" id="formTopic" method="post">
            <label for="titreTopic"><?= TXT_TITRE_TOPIC ?></label>
            <input type="text" name="titreTopic" id="titreTopic"
                   value="<?= (isset($_POST['titreTopic']) && $valFormTest == false) ? $_POST['titreTopic'] : "" ?>"/><br>
            <textarea name="descriptionTopic" id="descriptionTopic"
                      placeholder="<?= TXT_TITRE_DESCRIPTION ?>"></textarea>
        </form>
        <button type="submit" form="formTopic" name="valFormTopic">Envoyer</button>
    </div>
    <?php
}
?>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');

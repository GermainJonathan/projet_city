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
        </tr>
    </thead>
    <?php

    foreach ($listTopic as $topic){
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
        <label for="titreTopic"><?= TXT_TITRE_TOPIC ?></label>
        <input type="text" name="titreTopic" id="titreTopic" value="<?= (isset($_POST['titreTopic'])) ? $_POST['titreTopic'] : "" ?>"/><br>
        <textarea name="descriptionTopic" id="descriptionTopic" placeholder="<?= TXT_TITRE_DESCRIPTION ?>"></textarea>
    </form>
    <button type="submit" form="formTopic" name="valFormTopic">Envoyer</button>
</div>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');

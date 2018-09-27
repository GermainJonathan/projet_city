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
                <td><?= $topic->getDate() ?></td>
                <td><a href="?page=topic&topic=<?= $topic->getId() ?>"><?= $topic->getTitre() ?></a></td>
            </tr>
        </tbody>
        <?php
    }

    ?>
</table>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');

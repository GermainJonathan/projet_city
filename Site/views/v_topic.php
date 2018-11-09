<?php

// En tête de page
require_once(PATH_VIEWS.'header.php');

// menu navigation
require_once(PATH_VIEWS.'alert.php');?>
<div class="bodyForum container">
<h3 class="contact-title" id="titreTopic"><?= $topic->getTitre() ?></h3>
    <p><?= $topic->getDescription() ?></p>
    <p><?= $topic->getDate() ?></p>
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
    <tbody>
        <tr>
            <?php
            foreach ($listMessage as $message) {
                ?>
                <td><?= $message->getDate() ?></td>
                <td><?= $message->getNom().($message->getProfile() != 'User')? "" : " ★" ?></td>
                <td><?= $message->getMessage() ?></td>
                <?php
                if (isset($_SESSION['user']) && ($_SESSION['user']->getProfile() == "Administrateur" || $_SESSION['user']->getProfile() == "Moderateur")) {
                    ?>
                    <td><button class="btn btn-danger">X</button></td>
                    <?php
                }
            }
            ?>
        </tr>
    </tbody>
</table>
</div>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');

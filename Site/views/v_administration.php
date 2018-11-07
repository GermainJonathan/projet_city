<?php

// En tête de page
require_once(PATH_VIEWS.'header.php');

// menu navigation
require_once(PATH_VIEWS.'alert.php');?>

<div class="bodyForum">
    <table  class="table">
        <thead>
        <tr>
            <th><?= TITRE_ADMIN_NOM ?></th>
            <th><?= TITRE_ADMIN_MAIL ?></th>
            <th><?= TITRE_ADMIN_PROFILE ?></th>
            <th><?= TITRE_ACTION ?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($listUser as $user){
            ?>
            <tr>
                <td><?=$user->getNom()?></td>
                <td><?=$user->getMail()?></td>
                <td><?=$user->getProfile()?></td>
                <td><?= ($user->getCodeUser() != $_SESSION['user']->getCodeUser()) ? '<button class="btn col-2 btn-danger">X</button>' : '' ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');

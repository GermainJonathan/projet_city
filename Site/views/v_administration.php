<?php

// En tête de page
require_once(PATH_VIEWS.'header.php');

// menu navigation
require_once(PATH_VIEWS.'alert.php');?>

<div class="bodyForum container">
    <table  class="table table-hover table-striped">
        <thead>
        <tr>
            <th scope="col"><?= TITRE_ADMIN_NOM ?></th>
            <th scope="col"><?= TITRE_ADMIN_MAIL ?></th>
            <th scope="col"><?= TITRE_ADMIN_PROFILE ?></th>
            <th scope="col"><?= TITRE_ACTION ?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($listUser as $user){
            ?>
            <tr>
                <td data-label=<?= '"'.TITRE_ADMIN_NOM.'"' ?>><?=$user->getNom()?></td>
                <td data-label=<?= '"'.TITRE_ADMIN_MAIL.'"' ?>><?=$user->getMail()?></td>
                <td data-label=<?= '"'.TITRE_ADMIN_PROFILE.'"' ?>><?=$user->getProfile()?></td>
                <td data-label=<?= '"'.TITRE_ACTION.'"' ?>><?= ($user->getCodeUser() != $_SESSION['user']->getCodeUser()) ? '<button class="btn col-2 btn-danger">X</button>' : '' ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');

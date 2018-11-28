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
    <?php
        if(isset($_SESSION['user']) && ($_SESSION['user']->getProfile() == "Administrateur")){
            ?>
            <table  class="table table-hover table-striped">
                <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"><?= TITRE_ACTION ?></th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($listMessage as $message){
                    ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><button class="btn col-2 btn-danger">X</button></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
            <?php
        }
    ?>
</div>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');

<span class="anchor" id="anchorBodyCommentaires"></span>
<div id="bodyCommentaires" class="row">
    <h1>
        <?= TITRE_COMMENTAIRE ?>
    </h1>
    <?php
        if (empty($_SESSION['user'])){
            ?>
    <div class="col-12">
        <form action="" name="formCommentaireBellecour" id="formCommentaireBellecour" method="post">
            <div class="form-group">
                <label for="nomCommentaire">
                    <?= TXT_COMM_NOM ?></label>
                <input class="form-control" type="text" name="nomCommentaire" id="nomCommentaire" value="<?= (isset($_POST['titreTopic'])) ? $_POST['titreTopic'] : "" ?>" />
            </div>
            <div class="form-group">
                <textarea name="commentaire" id="commentaire" class="form-control" placeholder="<?= TXT_COMM_COMM ?>"></textarea>
            </div>
            <button type="submit" form="formCommentaireBellecour" name="valFormCommentaireBellecour" class="btn btn-primary">
                <?= TXT_ENVOYER ?></button>
        </form>
    </div>
    <?php
        }
        ?>
    <div class="col-12 mx-auto" id="tableCommentaire">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"><?= TITRE_DATE ?></th>
                    <th scope="col"><?= TITRE_COMM_NOM ?></th>
                    <th scope="col"><?= TITRE_COMMENTAIRE ?></th>
                    <?php
                    if(isset($_SESSION['user']) && $_SESSION['user']->getProfile() == "Administrateur"){
                        ?>
                    <th scope="col"><?= TITRE_ACTION ?></th>
                    <?php
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($listCommentaire as $commentaire){
                        ?>
                <td>
                    <?= $commentaire->getDate() ?>
                </td>
                <td>
                    <?= $commentaire->getNom() ?>
                </td>
                <td>
                    <?= $commentaire->getCommentaire() ?>
                </td>
                <?php
                        if(isset($_SESSION['user']) && $_SESSION['user']->getProfile() == "Administrateur"){
                        ?>
                <td><button class="btn btn-danger">X</button></td>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
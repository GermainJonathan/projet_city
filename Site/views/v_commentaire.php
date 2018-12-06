<span class="anchor" id="anchorBodyCommentaires"></span>
<div id="bodyCommentaires" class="container-fluid">
    <h1 class="row">
        <?= TITRE_COMMENTAIRE ?>
    </h1>
    <div class="col-12 mx-auto" id="tableCommentaire">
        <table class="table table-borderless">
            <thead style="text-align: left;">
                <tr>
                    <th scope="col" style="width: 15%;"><?= TITRE_COMM_NOM ?></th>
                    <th scope="col"><?= TITRE_COMMENTAIRE ?></th>
                    <th scope="col" style="width: 15%;"><?= TITRE_DATE ?></th>
                    <?php
                    if(isset($_SESSION['user']) && $_SESSION['user']->getProfile() == "Administrateur"){
                        ?>
                        <th scope="col"><?= TITRE_ACTION ?></th>
                        <?php
                    }
                    ?>
                </tr>
            </thead>
            <tbody id="commentaireTable" style="text-align: left;">
                <?php
                    foreach ($listCommentaire as $commentaire){
                        ?>
                <tr>
                    <td data-label=<?= TITRE_COMM_NOM ?>>
                        <?= $commentaire->getNom() ?>
                    </td>
                    <td data-label=<?= TITRE_COMMENTAIRE ?>>
                        <?= $commentaire->getCommentaire() ?>
                    </td>
                    <td data-label=<?= TITRE_DATE ?>>
                        <?= $commentaire->getDate() ?>
                    </td>
                    <?php
                        if(isset($_SESSION['user']) && $_SESSION['user']->getProfile() == "Administrateur"){
                        ?>
                    <td data-label=<?= TITRE_ACTION ?>>
                        <button id="<?=$commentaire->getCodeCommentaire()?>" class="btn btn-danger" onClick="openCommentaireModal($(this));">X</button>
                    </td>
                    <?php
                        }
                        ?>
                </tr>
                <?php
                    }
                    ?>
            </tbody>
        </table>
    </div>
    <?php
        if (empty($_SESSION['user']) || $_SESSION['user']->getCodeProfile() == 0){
            ?>
    <div class="col-12 mb-4">
        <form name="formCommentaire" id="formCommentaire">
            <div class="form-group">
                <input class="form-control" type="text" name="nomCommentaire" id="nomCommentaire" placeholder="Nom" value="<?= (isset($_SESSION['user']) && $_SESSION['user']->getCodeProfile() == 0) ? $_SESSION['user']->getNom() : "" ?>" />
            </div>
            <div class="form-group">
                <textarea name="commentaire" id="commentaire" class="form-control" placeholder="<?= TXT_COMM_COMM ?>"></textarea>
            </div>
            <button type="button" name="valFormCommentaire" class="btn btn-primary" onClick="sendMessage();"><?= TXT_ENVOYER ?></button>
        </form>
    </div>
    <?php
        }
    ?>
</div>
<!-- Modal -->
<div class="modal fade" id="commentaireModal" tabindex="-1" role="dialog" aria-labelledby="commentaireModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="commentaireModalTitle">Delete confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input id="idModal" type="text" class="form-control" hidden>
                <p>Are you sure to delete this object ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onClick="confirmDeleteCommentaire($('#commentaireModal').find('input#idModal').val());">Continue</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= PATH_SCRIPTS ?>commentaire.js"></script>

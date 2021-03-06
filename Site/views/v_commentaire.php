<span class="anchor" id="anchorBodyCommentaires"></span>
<div id="bodyCommentaires">
    <h1>
        <?= TITRE_COMMENTAIRE ?>
    </h1>
    <div class="col-12 mx-auto" id="tableCommentaire">
            <div id="commentaireTable" style="text-align: left;">
                <?php
                    foreach ($listCommentaire as $commentaire){
                ?>
                <div class="Uncommentaire" id="<?=$commentaire->getCodeCommentaire()?>">
                    <div class="titreCommentaire">
                        <h5> <?= $commentaire->getNom() ?> </h5>
                        <h5> <?= $commentaire->getDate() ?> </h5>
                        <?php
                            if(isset($_SESSION['user']) && $_SESSION['user']->getProfile() == "Administrateur"){
                        ?>
                            <div style="float: right;">
                                <button id="<?=$commentaire->getCodeCommentaire()?>" class="btn btn-danger" onClick="openCommentaireModal($(this));">X</button>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="commentaireTxt">
                        <pre><?= $commentaire->getCommentaire() ?></pre>
                    </div>
                </div>
                <?php
                    }
                    ?>
        </div>
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
                <h5 class="modal-title" id="commentaireModalTitle"><?= DELETE_CONFIRM ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input id="idModal" type="text" class="form-control" hidden>
                <p><?= TEXT_CONFIRM_DELETE ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= CANCEL ?></button>
                <button type="button" class="btn btn-primary" onClick="confirmDeleteCommentaire($('#commentaireModal').find('input#idModal').val());"><?= CONTINUER ?></button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= PATH_SCRIPTS ?>commentaire.js"></script>
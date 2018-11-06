<?php

// En tête de page
require_once(PATH_VIEWS.'header.php');

// menu navigation
require_once(PATH_VIEWS.'alert.php');?>

<div class="login-form container">
    <div class="login-form-group">
        <form action="" method="post" name="formConnexion" id="formConnexion">
            <div class="id row col-12">
                <label for="login">Identifiant</label>
                <input type="text" class="form-control" name="login" id="login" placeholder="Nom d'utilisateur">
            </div>      
            <div clas="mdp row col-12">
                <label for="passWord">Mot de passe</label>
                <input type="password" class="form-control" name="passWord" id="passWord">
            </div>
            <div class="row col-6">
                <button form="formConnexion" class="btn btn-primary" type="submit" name="valFormConnexion">Valider</button>
            </div>
        </form>
    </div>
</div>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');

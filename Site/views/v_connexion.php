<?php

// En tête de page
require_once(PATH_VIEWS.'header.php');

// menu navigation
require_once(PATH_VIEWS.'alert.php');?>

<div class="login-form">
    <div class="login-form-group">
        <form action="" method="post" name="formConnexion" id="formConnexion"> 
            <div class="loginTitle no-margin row">
                <h2>Identification</h2>
            </div>
            <hr>
            <div class="input-group no-margin row col-12">
                <div class="input-group-prepend">
                    <span class="input-group-text user" id="basic-addon1"></span>
                </div>
                <input type="text" name="login" id="login" class="form-control" placeholder="Nom d'utilisateur" aria-label="Username" aria-describedby="basic-addon1">
            </div>   
            <div class="input-group no-margin row col-12">
                <div class="input-group-prepend">
                    <span class="input-group-text mdp" id="basic-addon2"></span>
                </div>
                <input type="password" class="form-control" name="passWord" id="passWord" aria-label="Username" aria-describedby="basic-addon2">
            </div>
            <hr>
            <div class="no-margin row col-6">
                <button form="formConnexion" class="btn btn-primary" type="submit" name="valFormConnexion">Valider</button>
            </div>
        </form>
    </div>
</div>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');

<?php

// En tête de page
require_once(PATH_VIEWS.'header.php');

// menu navigation
require_once(PATH_VIEWS.'alert.php');?>

<div class="form-control">
    <form action="" method="post" name="formConnexion" id="formConnexion">
        <label for="login">idantifiant</label>
        <input type="text" name="login" id="login" placeholder="BruceWayne">
        <label for="passWord">Mot de passe</label>
        <input type="password" name="passWord" id="passWord" placeholder="B@tm4n">
        <button form="formConnexion" type="submit" name="valFormConnexion">Valider</button>
    </form>
</div>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');

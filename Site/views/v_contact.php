<?php

// En tête de page
require_once(PATH_VIEWS.'header.php');

// menu navigation
require_once(PATH_VIEWS.'alert.php');?>

<!-- Partie a propos -->
<div class="row" id="contact-block-aPropos">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
        <h1 class="contact-title"> A propos </h1>
        <p class="contact-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
        nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit 
        in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur 
        sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt 
        mollit anim id est laborum.</p>
    </div>
    <div class="col-lg-4"></div>
</div>
<!-- Fin Partie a propos -->
<div class="row" id="contact-block-formulaire">
    <div class="col-lg-1"></div>
    <div class="col-lg-4 sm-12">
        <h1>Contact</h1>
        <form>
            <label for="validationServer01">Nom</label>
            <input type="text" class="form-control is-valid" id="validationServer01" placeholder="Louis" value="Mark" required>
            <div class="valid-feedback">
                Cool!
            </div>
            <label for="validationServer02">Prenom</label>
            <input type="text" class="form-control is-valid" id="validationServer02" placeholder="Lumière" value="Otto" required>
            <div class="valid-feedback">
                Super!
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Email</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="nom@example.com">
            </div>
        </form>
    </div>
    <div class="col-lg-6 sm-12">
        <form>
            <div class="form-group">
                <label for="formGroupExampleInput">Objet</label>
                <input type="text" class="form-control" id="objet">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Example textarea</label>
                <textarea class="form-control contact-text-area" id="exampleFormControlTextarea1" rows="3"></textarea>
                
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
        </form>
    </div>
    <div class="col-lg-1"></div>
</div>


<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');

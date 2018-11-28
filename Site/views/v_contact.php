<?php

// En tête de page
require_once(PATH_VIEWS.'header.php');

// menu navigation
require_once(PATH_VIEWS.'alert.php');?>

<!-- parallax -->
<div class="parallax" style="background-size: auto;" data-height="30" data-image-src="<?= PATH_CONTACT.'lyon2.jpg' ?>">
    <h1 class="textParralax"></h1>
</div>

<!-- Partie a propos -->

<div class="row container-fluid" id="contact-block-aPropos">
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

<!--  Partie formulaire -->
<div class="row container-fluid" id="contact-block-formulaire">
    <div class="col-lg-1"></div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <h1>Contact</h1>
        <form>
            <label for="validationServer01">Nom</label>
            <input type="text" class="form-control" id="validationServer01" required>
            <label for="validationServer02">Prenom</label>
            <input type="text" class="form-control" id="validationServer02" required>
            <div class="form-group">
                <label for="exampleFormControlInput1">Email</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="nom@example.com">
            </div>
        </form>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12">
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
<!--  Fin Partie formulaire -->


<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');

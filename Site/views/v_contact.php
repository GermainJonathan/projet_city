<?php

// En tête de page
require_once(PATH_VIEWS.'header.php');

// menu navigation
require_once(PATH_VIEWS.'alert.php');?>

<!-- parallax -->
<div class="parallax" data-height="20" data-image-src="<?= PATH_ACCUEIL.'lyon.jpg' ?>">
    <div class="caption">
        <span class="border"><?= MENU_CONTACT ?></span>
    </div>
</div>

<!-- Partie a propos -->

<div class="row container-fluid" id="contact-block-aPropos">
    <div class="col-lg-4 offset-lg-4 col-sm-8 offset-lg-2">
        <h1 class="contact-title"> <?= TITRE_CONTACT_A_PROPOS ?> </h1>
        <div class="contact-desc">
        <p><?= TXT_CONTACT_APROPOS ?></p>
        <p>Bâtiment Les Passerelles,<br/> 24 Avenue Joannès Masset, <br/>69009 Lyon</p>
        <p>04 84 25 01 28 <br/> lgastard@g-4.fr</p>
        <p> <strong> <?=TXT_CONTACT_FORMULAIRE ?> </strong> </p>
        </div>
    </div>
</div>
<!-- Fin Partie a propos -->

<!--  Partie formulaire -->
<div class="row container-fluid" id="contact-block-formulaire">
    <div class="col-lg-1"></div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <form>
            <label for="validationServer01"><?=CHAMP_NOM ?> <span class="Obligatoire"> *</span></label>
            <input type="text" class="form-control formInput" maxLength=50 id="validationServer01" required>
            <label for="validationServer02"><?=CHAMP_PRENOM ?> <span class="Obligatoire"> *</span></label>
            <input type="text" class="form-control formInput" maxLength=50 id="validationServer02" required>
            <div class="form-group">
                <label for="exampleFormControlInput1"><?=CHAMP_EMAIL ?> <span class="Obligatoire"> *</span></label>
                <input type="email" class="form-control formInput" id="exampleFormControlInput1" placeholder="nom@example.com">
            </div>
        </form>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12">
        <form>
            <div class="form-group">
                <label for="formGroupExampleInput"><?=CHAMP_SUJET ?> <span class="Obligatoire"> *</span> </label>
                <input type="text" class="form-control" id="objet">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1"><?=CHAMP_MESSAGE ?>  </label>
                <textarea class="form-control contact-text-area" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary"><?=TXT_VALIDER ?></button>
            </div>
        </form>
    </div>
    <div class="col-lg-1"></div>
</div>
<!--  Fin Partie formulaire -->


<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');

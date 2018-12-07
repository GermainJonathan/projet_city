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
    <div class="col-lg-4 offset-lg-4 col-sm-8 offset-sm-2">
        <h1 class="contact-title"> <?= TITRE_CONTACT_A_PROPOS ?> </h1>
        <div class="contact-desc">
        <p><?= TXT_CONTACT_APROPOS ?></p>
        <p><?= ADRESSE ?></p>
        <p>
            <a href="tel:<?= TEL_ADMIN ?>"><?= TEL_ADMIN_TEXT ?></a><br/>
            <a href="mailto:<?= MAIL_ADMIN ?>"><?= MAIL_ADMIN ?></a>
        </p>
        <p> <strong> <?=TXT_CONTACT_FORMULAIRE ?> </strong> </p>
        </div>
    </div>
</div>
<!-- Fin Partie a propos -->

<!--  Partie formulaire -->
<div class="row container-fluid" id="contact-block-formulaire">
    <div class="col-lg-5 offset-lg-1 col-md-6 col-sm-12">
        <label for="validationServer01"><?=CHAMP_NOM ?> <span class="Obligatoire"> *</span></label>
        <input type="text" id="inputNom" class="form-control formInput" maxLength=50 id="validationServer01" required>
        <label for="validationServer02"><?=CHAMP_PRENOM ?> <span class="Obligatoire"> *</span></label>
        <input type="text" id="inputPrenom" class="form-control formInput" maxLength=50 id="validationServer02" required>
        <label for="inputEmail"><?=CHAMP_EMAIL ?> <span class="Obligatoire"> *</span></label>
        <input type="email" id="inputEmail" class="form-control formInput" placeholder="nom@example.com">

    </div>
    <div class="col-lg-5 col-md-6 col-sm-12">
        <label for="inputSujet"><?=CHAMP_SUJET ?> <span class="Obligatoire"> *</span> </label>
        <input type="text" id="inputSujet" class="form-control formInput" id="objet">
        <label for="TextAreaMessage"><?=CHAMP_MESSAGE ?>  </label>
        <textarea class="form-control contact-text-area" id="TextAreaMessage" rows="3"></textarea>
        <div class="d-flex justify-content-end btnPageContact">
            <button type="submit" id="btnValiderContact" class="btn btn-primary"><?=TXT_VALIDER ?></button>
        </div>
    </div>
</div>
<!--  Fin Partie formulaire -->
<script type="text/javascript" src="<?= PATH_SCRIPTS ?>contact.js"></script>
<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');

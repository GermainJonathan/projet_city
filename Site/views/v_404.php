<?php

require_once PATH_VIEWS.'header.php';

require_once PATH_VIEWS.'alert.php';
?>
<div class="container">
    <div class="row col">
        <div class="w-100 <?php echo 'erreur404'.LANG ?>"></div>
        <a href="?page=accueil" id="button404" class="mx-auto btn btn-primary"><?= RETOUR_ACCUEIL ?></a>
    </div>
</div>
<?php

require_once PATH_VIEWS.'footer.php';

<?php

// En tête de page
require_once(PATH_VIEWS.'header.php');

// menu navigation
require_once(PATH_VIEWS.'alert.php');?>

<?php

foreach ($listMessage as $message)
    echo $message;
?>


<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');

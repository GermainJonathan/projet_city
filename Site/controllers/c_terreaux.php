<?php

require_once PATH_MODELS.'manager.php';

$manager = new manager();
$quartier = $manager->getQuartierByLibelle(ucfirst($_GET['page']));
$listCommentaire = $manager->getCommentaire($quartier->getCodeQuartier());

require_once PATH_VIEWS.'terreaux.php';

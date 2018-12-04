<?php

require_once PATH_MODELS."manager.php";

$manager = new manager();
$valFormTest = false;

if(isset($_SESSION['user']) && ($_SESSION['user']->getProfile() == "Administrateur" || $_SESSION['user']->getProfile() == "Moderateur"))
    $listTopic = $manager->getTopicAll();
else
    $listTopic = $manager->getTopicValid();

require_once PATH_VIEWS.'forum.php';

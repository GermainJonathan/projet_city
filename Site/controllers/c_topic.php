<?php

require_once PATH_MODELS.'manager.php';

// vérification du topic existant
if(empty($_GET['topic']))
    header("Location: index.php?page=404");
$idTopic = $_GET['topic'];

$manager = new manager();

if(!$manager->verifyTopic($idTopic))
    header("Location: index.php?page=404");

$topic = $manager->getTopicById($idTopic);
$listMessage = $manager->getMessageByTopic($idTopic);

require_once PATH_VIEWS.'topic.php';

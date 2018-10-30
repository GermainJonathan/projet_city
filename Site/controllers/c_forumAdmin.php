<?php

if($_SESSION['user'] != "Administrateur")
    header("Location: index.php");

require_once PATH_MODELS."manager.php";

$manager = new manager();


$listTopic = $manager->getTopicAll();

require_once PATH_VIEWS.'forumAdmin.php';

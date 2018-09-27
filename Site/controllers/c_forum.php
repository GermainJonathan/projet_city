<?php

require_once PATH_MODELS."manager.php";

$manager = new manager();

$listTopic = $manager->getTopic();

require_once PATH_VIEWS.'forum.php';

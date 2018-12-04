<?php

require_once PATH_MODELS.'administrationDAO.php';
require_once PATH_MODELS.'manager.php';

if(empty($_SESSION['user']))
    header('Location: index.php');

$manager = new manager();

$listUser = $manager->getUserAll();

if(isset($_SESSION['user']) && ($_SESSION['user']->getProfile() == "Administrateur"))
    $listMessage = $manager->getMessageContact();

require_once PATH_VIEWS.'administration.php';
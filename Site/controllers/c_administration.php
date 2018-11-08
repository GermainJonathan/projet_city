<?php

require_once PATH_MODELS.'administrationDAO.php';
require_once PATH_MODELS.'manager.php';

if(empty($_SESSION['user']))
    header('Location: index.php');

$manager = new manager();

$listUser = $manager->getUserAll();

require_once PATH_VIEWS.'administration.php';
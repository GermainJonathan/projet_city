<!DOCTYPE html>
<html>
	<head>
		<title><?= TITRE ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="Language" content="<?= LANG ?>"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> 

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="icon" href="<?= PATH_IMAGES . "favicon.png" ?>"/>
		<link href="<?= PATH_CSS ?>accueil.css" rel="stylesheet"/>
		<link href="<?= PATH_CSS ?>parallax.css" rel="stylesheet"/>
		<link href="<?= PATH_CSS ?>communTheme.css" rel="stylesheet"/>
		<link href="<?= PATH_CSS ?>quartier.css" rel="stylesheet"/>
		<link href="<?= PATH_CSS ?>forum.css" rel="stylesheet"/>
		<link href="<?= PATH_CSS ?>header.css" rel="stylesheet"/>
		<link href="<?= PATH_CSS ?>footer.css" rel="stylesheet"/>
		<link href="<?= PATH_CSS ?>contact.css" rel="stylesheet"/>
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin=""/>
		<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA==" crossorigin=""></script> 
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?= PATH_SCRIPTS ?>bootstrap-notify.js"></script>
		<script type="text/javascript" src="<?= PATH_SCRIPTS ?>library.js"></script>
		<script type="text/javascript" src="<?= PATH_ASSETS ?>datas/presquileGEOJSON.js"></script>
		<script type="text/javascript" src="<?= PATH_SCRIPTS ?>accueil.js"></script>
		<script type="text/javascript" src="<?= PATH_SCRIPTS ?>parallax.js"></script>
	</head> 
	<body data-spy="scroll" data-target="#sideBar" data-offset="20">
		<?php require_once(PATH_VIEWS.'menu.php');?>
		<?php require_once(PATH_VIEWS.'spinner.php');?>
		<div id="basePage">
			
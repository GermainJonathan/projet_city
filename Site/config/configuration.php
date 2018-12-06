<?php
 
const DEBUG = true; // production : false
                    // dev : true

// Accès base de données. A modifier pour se connecter
const BD_HOST = 'localhost';
const BD_DBNAME = 'projet_city';
const BD_USER = 'root';
const BD_PWD = '';

// Langue du site
const LANG ='FR';

// Paramètres du site : nom de l'auteur ou des auteurs
const AUTEUR = 'AG4île';
const MAIL_ADMIN = 'paulpoupet@atilog.com';


//dossiers racines du site
define('PATH_CONTROLLERS','controllers/c_');
define('PATH_SERVICES', 'services/');
define('PATH_ENTITY','entity/');
define('PATH_ASSETS','assets/');
define('PATH_LIB','lib/');
define('PATH_MODELS','models/');
define('PATH_VIEWS','views/v_');
define('PATH_TEXTES','languages/');
define('PATH_BANNED_WORDS', 'banned words/words.txt');

//sous dossiers
define('PATH_CSS', PATH_ASSETS.'css/');
define('PATH_IMAGES', PATH_ASSETS.'images/');
define('PATH_SCRIPTS', PATH_ASSETS.'scripts/');
define('PATH_ACCUEIL', PATH_IMAGES.'accueil/');
define('PATH_BELLECOUR', PATH_IMAGES.'bellecour/');
define('PATH_PERRACHE', PATH_IMAGES.'perrache/');
define('PATH_TERREAUX', PATH_IMAGES.'terreaux/');
define('PATH_CONTACT', PATH_IMAGES.'contact/');
define('PATH_CORE', PATH_IMAGES.'core/');


//fichiers
define('PATH_LOGO', PATH_IMAGES.'core/logo.png');
define('PATH_MENU', PATH_VIEWS.'menu.php');

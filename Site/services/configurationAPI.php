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

const PATH = array('', '../assets/images/perrache/', '../assets/images/bellecour/', '../assets/images/terreaux/');

//dossiers racines du site
define('PATH_CONTROLLERS','../controllers/c_');
define('PATH_SERVICES', '../services/');
define('PATH_ENTITY','../entity/');
define('PATH_ASSETS','../assets/');
define('PATH_LIB','../lib/');
define('PATH_MODELS','../models/');
define('PATH_VIEWS','../views/v_');
define('PATH_TEXTES','../languages/');
define('PATH_BANNED_WORDS', '../banned words/words.txt');
define('PATH_LANG_VOID', PATH_TEXTES . 'void.php');

//sous dossiers
define('PATH_CSS', PATH_ASSETS.'css/');
define('PATH_IMAGES', PATH_ASSETS.'images/');
define('PATH_SCRIPTS', PATH_ASSETS.'scripts/');
define('PATH_ACCUEIL', PATH_IMAGES.'accueil/');
define('PATH_BELLECOUR', PATH_IMAGES.'bellecour/', true);
define('PATH_PERRACHE', PATH_IMAGES.'perrache/', true);
define('PATH_TERREAUX', PATH_IMAGES.'terreaux/', true);
define('PATH_CONTACT', PATH_IMAGES.'contact/');
define('PATH_CORE', PATH_IMAGES.'core/');


//fichiers
define('PATH_LOGO', PATH_IMAGES.'logo.png');
define('PATH_MENU', PATH_VIEWS.'menu.php');

require_once PATH_LIB.'foncBase.php';
require_once PATH_MODELS."user.php";

//selection de la langue
session_start();

if (isset($_SESSION["lang"]) && !empty($_SESSION["lang"]))
    $lang = $_SESSION["lang"];
else
    $lang = getLangage();

require_once PATH_TEXTES.$lang.'.php';
<?php

require_once PATH_MODELS."DAO.php";
require_once PATH_MODELS.'pays.php';

// classe de communicaton avec la bd pour les pays et le choix de la langue
class administrationDAO extends DAO
{

    public function verifConnexionUser($login, $passWord){
        $result = $this->queryRow("SELECT * FROM administration WHERE personne=? AND passWord=?", array($login, password_hash($passWord)));
        var_dump($result);
    }

}
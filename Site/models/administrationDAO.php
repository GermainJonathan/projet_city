<?php

require_once PATH_MODELS."DAO.php";
require_once PATH_MODELS.'user.php';

// classe de communicaton avec la bd pour les pays et le choix de la langue
class administrationDAO extends DAO
{

    public function verifConnexionUser($login, $passWord){
        $result = $this->queryRow("SELECT * FROM user WHERE login=? AND passWord=?", array($login, password_hash($passWord, PASSWORD_DEFAULT)));
        var_dump($result);
        var_dump($login);
        var_dump(password_hash($passWord, PASSWORD_DEFAULT));
        if($result === false)
            return false;
        else
            return true;
    }

}
<?php

require_once PATH_MODELS."DAO.php";
require_once PATH_MODELS.'user.php';


class administrationDAO extends DAO
{

    public function verifConnexionUser($login, $passWord){
        $result = $this->queryRow("SELECT * FROM user WHERE login=?", array($login));
        if(password_verify($passWord, $result['passWord'])){

            $res = $this->queryRow("SELECT * FROM profile WHERE codeProfile = ?", array($result['codeProfile']));

            return new user($result['codeUser'], $result['nom'], $result['mail'], $result['codeProfile'], $res['libelleProfile']);
        }
        else
            return false;
    }

    public function setEtatTopic($idtopic, $codeEtatTopic){

        return $this->queryBdd("UPDATE topic SET codeEtat = ? WHERE codeTopic = ?", array($codeEtatTopic, $idtopic));

    }

    public function getUser(){
        $result = $this->queryAll("SELECT * FROM user");

        foreach ($result as $temp) {
            $res = $this->queryRow("SELECT * FROM profile WHERE codeProfile = ?", array($temp['codeProfile']));
            $listUser[] = new user($temp['codeUser'], $temp['nom'], $temp['mail'], $temp['codeProfile'], $res['libelleProfile']);
        }
        return $listUser;
    }

}
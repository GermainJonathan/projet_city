<?php

require_once PATH_MODELS."DAO.php";
require_once PATH_MODELS.'user.php';


class administrationDAO extends DAO
{

    /**
     * @param $login
     * @param $passWord
     * @return bool|user
     */
    public function verifConnexionUser($login, $passWord){
        $result = $this->queryRow("SELECT * FROM user WHERE login=?", array($login));
        if(password_verify($passWord, $result['passWord'])){

            $res = $this->queryRow("SELECT * FROM profile WHERE codeProfile = ?", array($result['codeProfile']));

            return new user($result['codeUser'], $result['nom'], $result['mail'], $result['codeProfile'], $res['libelleProfile']);
        }
        else
            return false;
    }

    /**
     * @param $idtopic
     * @param $codeEtatTopic
     * @return bool
     */
    public function setEtatTopic($idtopic, $codeEtatTopic){

        return $this->queryBdd("UPDATE topic SET codeEtat = ? WHERE codeTopic = ?", array($codeEtatTopic, $idtopic));

    }

    /**
     * @return array
     */
    public function getUser(){
        $result = $this->queryAll("SELECT * FROM user");

        $listUser = array();
        foreach ($result as $temp) {
            $res = $this->queryRow("SELECT * FROM profile WHERE codeProfile = ?", array($temp['codeProfile']));
            $listUser[] = new user($temp['codeUser'], $temp['nom'], $temp['mail'], $temp['codeProfile'], $res['libelleProfile']);
        }
        return $listUser;
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteUser($id){
        return $this->queryBdd("DELETE FROM user WHERE codeUser = ?", $id);
    }

    /**
     * @return bool
     */
    public function getMessageContactAll(){
        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    public function getMessageContactById($id){
        return true;
    }

    /**
     * @return bool
     */
    public function createMessageContact(){
        return true;
    }
}
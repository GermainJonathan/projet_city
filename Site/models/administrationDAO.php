<?php

require_once PATH_MODELS."DAO.php";
require_once PATH_MODELS.'user.php';
require_once PATH_MODELS.'messageContact.php';


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
     * @return array
     */
    public function getMessageContactAll(){
        $result = $this->queryAll("SELECT * FROM messageContact");
        $listMessageContact = array();
        foreach ($result as $temp)
            $listMessageContact[] = new messageContact($temp["codeMessage"], $temp["nom"], $temp["prenom"], $temp["mail"], $temp["objet"], $temp["message"], date($temp["date"]));
        return $listMessageContact;
    }

    /**
     * @param $id
     * @return messageContact
     */
    public function getMessageContactById($id){
        $result = $this->queryRow("SELECT * FROM messageContact WHERE codeMessage = ?", array($id));
        return new messageContact($result["codeMessage"], $result["nom"], $result["prenom"], $result["mail"], $result["objet"], $result["message"], $result["date"]);
    }


    /**
     * @param $nom
     * @param $prenom
     * @param $mail
     * @param $objet
     * @param $message
     * @return messageContact
     */
    public function createMessageContact($nom, $prenom, $mail, $objet, $message){
        $max = $this->queryRow("SELECT MAX(codeMessage) as max FROM messageContact");
        $max = ($max['max'] == null)? 0 : $max['max'] + 1;
        $this->queryBdd("INSERT INTO messageContact VALUES(?, ?, ?, ?, ?, ?, CURRENT_DATE)", array($max, $nom, $prenom, $mail, $objet, $message));
        return $this->getMessageContactById($max);
    }
}
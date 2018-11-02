<?php

require_once PATH_MODELS."DAO.php";
require_once PATH_MODELS."topic.php";
require_once PATH_MODELS."message.php";

// class de discustion avec la bd pour la partie forum
class forumDAO extends DAO
{

    // sort les topics validé par l'admin
    public function getTopicValid(){

        $result = $this->queryAll("SELECT * FROM topic WHERE codeEtat = 2");
        
        $listTopic = array();
        foreach ($result as $temp)
            $listTopic[] = new topic($temp[0], $temp[1], $temp[2], $temp[3], $temp[4], $temp[5]);

        return $listTopic;

    }

    // sort tous les topics (pour l'admin)
    public function getTopicAll(){
        $result = $this->queryAll("SELECT * FROM topic");
        $listTopic = array();
        foreach ($result as $temp){
            $res = $this->queryRow("SELECT libelleEtat FROM etatTopic WHERE codeEtat = ?", array($temp[4]));
            $listTopic[] = new topic($temp[0], $temp[1], $temp[2], $temp[3], $res[0], $temp[4], $temp[5]);
        }
        return $listTopic;
    }

    // sort un topic ou false par un ID
    public function getTopicById($idTopic){

        $result = $this->queryRow("SELECT * FROM topic WHERE codeTopic  = ?", array($idTopic));

        return new topic($result['codeTopic'], $result['codePays'], $result['libelleTopic'], $result['description'], $result['codeEtat'], $result['date']);

    }

    // sort les messages d'un topic
    public function getMessageByTopic($idTopic){

        $result = $this->queryAll("SELECT * FROM message WHERE codetopic  = ?", array($idTopic));

        $listMessage = array();
        foreach ($result as $temp)
            $listMessage[] = new message($temp['codeMessage'], $temp['codeTopic'], $temp['message'], $temp['date']);

        return $listMessage;
    }

    // vérifi si un topic exciste et est actif
    public function verifyTopic($idTopic){

        return $this->queryRow("SELECT * FROM topic WHERE codeTopic = ?", array($idTopic));

    }

    public function createNewTopic($titre, $description, $idLang){

        $result = $this->queryRow("SELECT MAX(codeTopic) FROM topic");
        $maxId = $result['codeTopic'] + 1;

        $result = $this->queryBdd("INSERT INTO topic (codeTopic, codePays, libelleTopic, description, codeEtat, date) VALUES (?, ?, ?, ?, ?, CURRENT_DATE)", array($maxId, $idLang, $titre, $description, 1));

        //var_dump($result);

        return $result;

    }

}
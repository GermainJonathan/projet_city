<?php

require_once PATH_MODELS."DAO.php";
require_once PATH_MODELS."topic.php";
require_once PATH_MODELS."message.php";

// class de discustion avec la bd pour la partie forum
class forumDAO extends DAO
{

    // sort tous les topics
    public function getTopic(){

        $result = $this->queryAll("SELECT * FROM topic");

        $listTopic = array();
        foreach ($result as $temp)
            $listTopic[] = new topic($temp[0], $temp[1], $temp[2], $temp[3], $temp[4], $temp[5]);

        return $listTopic;

    }

    // sort un topic ou false par un ID
    public function getTopicById($idTopic){

        $result = $this->queryRow("SELECT * FROM topic WHERE codeTopic  = ?", array($idTopic));

        return new topic($result[0], $result[1], $result[2], $result[3], $result[4], $result[5]);

    }

    // sort les messages d'un topic
    public function getMessageByTopic($idTopic){

        $result = $this->queryAll("SELECT * FROM message WHERE codetopic  = ?", array($idTopic));

        $listMessage = array();
        foreach ($result as $temp)
            $listMessage[] = new message($temp[0], $temp[1], $temp[2], $temp[3]);

        return $listMessage;
    }

    // vérifi si un topic exciste et est actif
    public function verifyTopic($idTopic){

        return $this->queryRow("SELECT * FROM topic WHERE codeTopic = ?", array($idTopic));

    }

    public function createNewTopic($titre, $description, $idLang){

        $result = $this->queryRow("SELECT MAX(codeTopic) FROM topic");
        $maxId = $result[0] + 1;

        $result = $this->queryBdd("INSERT INTO topic (codeTopic, codePays, libelleTopic, description, codeEtat, date) VALUES (?, ?, ?, ?, ?, CURRENT_DATE)", array($maxId, $idLang, $titre, $description, 1));

        //var_dump($result);

        return $result;

    }

}
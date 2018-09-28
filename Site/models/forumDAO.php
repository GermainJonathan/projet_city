<?php

require_once PATH_MODELS."DAO.php";
require_once PATH_MODELS."topic.php";
require_once PATH_MODELS."message.php";

class forumDAO extends DAO
{

    public function getTopic(){

        $result = $this->queryAll("SELECT * FROM topic");

        $listTopic = array();
        foreach ($result as $temp)
            $listTopic[] = new topic($temp[0], $temp[1], $temp[2], $temp[3], $temp[4], $temp[5]);

        return $listTopic;

    }

    public function getTopicById($idTopic){

        $result = $this->queryRow("SELECT * FROM topic WHERE codeTopic  = ?", array($idTopic));

        return new topic($result[0], $result[1], $result[2], $result[3], $result[4], $result[5]);

    }

    public function getMessageByTopic($idTopic){

        $result = $this->queryAll("SELECT * FROM message WHERE codetopic  = ?", array($idTopic));

        $listMessage = array();
        foreach ($result as $temp)
            $listMessage[] = new message($temp[0], $temp[1], $temp[2], $temp[3]);

        return $listMessage;

    }

    public function verifyTopic($idTopic){

        return $this->queryRow("SELECT * FROM topic WHERE codeTopic = ?", array($idTopic));

    }

}
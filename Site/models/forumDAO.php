<?php

require_once PATH_MODELS."DAO.php";

class forumDAO extends DAO
{

    public function getTopic(){

        $result = $this->queryAll("SELECT * FROM topic");

    }

    public function getMessageByTopic($idTopic){

        $result = $this->queryAll("SELECT * FROM message WHERE codetopic  = ?", array($idTopic));

    }

}
<?php

require_once PATH_MODELS.'paysDAO.php';
require_once PATH_MODELS.'forumDAO.php';

class manager
{
    public function getPays($id = null)
    {
        $paysDAO = new paysDAO(DEBUG);
        return $paysDAO->getPays();
    }

    public function getTopic(){
        $forumDAO = new forumDAO(DEBUG);
        return $forumDAO->getTopic();
    }

    public function getTopicById($idTopic){
        $forumDAO = new forumDAO(DEBUG);
        return $forumDAO->getTopicById($idTopic);
    }

    public function getMessageByTopic($idTopic){
        $forumDAO = new forumDAO(DEBUG);
        return $forumDAO->getMessageByTopic($idTopic);
    }

    public function verifyTopic($idTopic){
        $forumDAO = new forumDAO(DEBUG);
        if($forumDAO->verifyTopic($idTopic) == false)
            return false;
        else
            return true;
    }

}


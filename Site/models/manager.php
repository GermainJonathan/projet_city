<?php

require_once PATH_MODELS.'paysDAO.php';
require_once PATH_MODELS.'forumDAO.php';

// class central
// c'est la seul class appalé par les controleur
// elle fait le ien entre les moedels et les controlleurs
class manager
{
    public function getPays($id = null)
    {
        $paysDAO = new paysDAO(DEBUG);
        return $paysDAO->getPays();
    }

    public function getTopicValid(){
        $forumDAO = new forumDAO(DEBUG);
        return $forumDAO->getTopicValid();
    }

    public function getTopicAll(){
        $forumDAO = new forumDAO(DEBUG);
        return $forumDAO->getTopicAll();
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

    public function createTopic($titre, $description){
        $forumDAO = new forumDAO(DEBUG);
        return $forumDAO->createNewTopic($titre, $description, $_SESSION['idLang']);
    }

}


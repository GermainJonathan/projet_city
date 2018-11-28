<?php

require_once PATH_MODELS.'paysDAO.php';
require_once PATH_MODELS.'quartierDAO.php';
require_once PATH_MODELS.'forumDAO.php';
require_once PATH_MODELS.'administrationDAO.php';
require_once PATH_MODELS.'commentaireDAO.php';

// class central
// c'est la seul class appalé par les controleur
// elle fait le lien entre les moedels et les controlleurs
class manager
{
    public function getPays($id = null)
    {
        $paysDAO = new paysDAO(DEBUG);
        return $paysDAO->getPays();
    }

    public function getQuartierByLibelle($quartier){
        $quartierDAO = new quartierDAO(DEBUG);
        return $quartierDAO->getQuartierByLibelle($quartier);
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

    public function testConnexionUser($login, $mdp){
        $adminDAO = new administrationDAO(DEBUG);
        return $adminDAO->verifConnexionUser($login, $mdp);
    }


    public function getUserAll(){
        $adminDAO = new administrationDAO(DEBUG);
        return $adminDAO->getUser();
    }

    public function addCommentaire($nom, $commentaire, $codeQuartier){
        $commentaireDAO = new commentaireDAO(DEBUG);
        $commentaireDAO->addCommentaire($_SESSION['idLang'], $codeQuartier, $commentaire, $nom);
    }

    public function getCommentaire($codeQuartier){
        $commentaireDAO = new commentaireDAO(DEBUG);
        return $commentaireDAO->getCommentaire($_SESSION['idLang'], $codeQuartier);
    }

    public function getMessageContact(){
        $administrationDAO = new administrationDAO(DEBUG);
        return $administrationDAO->getMessageContactAll();
    }

}


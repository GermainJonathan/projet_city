<?php

require_once PATH_MODELS.'paysDAO.php';
require_once PATH_MODELS.'quartierDAO.php';
require_once PATH_MODELS.'forumDAO.php';
require_once PATH_MODELS.'administrationDAO.php';
require_once PATH_MODELS.'commentaireDAO.php';

/// class central
/// c'est la seul class appalé par les controleur
/// elle fait le lien entre les moedels et les controlleurs
class manager
{
    /**
     * @param null $id
     * @return array
     */
    public function getPays($id = null)
    {
        $paysDAO = new paysDAO(DEBUG);
        return $paysDAO->getPays();
    }

    /**
     * @param $quartier
     * @return quartier
     */
    public function getQuartierByLibelle($quartier){
        $quartierDAO = new quartierDAO(DEBUG);
        return $quartierDAO->getQuartierByLibelle($quartier);
    }

    /**
     * @return array
     */
    public function getTopicValid(){
        $forumDAO = new forumDAO(DEBUG);
        return $forumDAO->getTopicValid();
    }

    /**
     * @return array
     */
    public function getTopicAll(){
        $forumDAO = new forumDAO(DEBUG);
        return $forumDAO->getTopicAll();
    }

    /**
     * @param $idTopic
     * @return topic
     */
    public function getTopicById($idTopic){
        $forumDAO = new forumDAO(DEBUG);
        return $forumDAO->getTopicById($idTopic);
    }

    /**
     * @param $idTopic
     * @return array
     */
    public function getMessageByTopic($idTopic){
        $forumDAO = new forumDAO(DEBUG);
        return $forumDAO->getMessageByTopic($idTopic);
    }

    /**
     * @param $idTopic
     * @return bool
     */
    public function verifyTopic($idTopic){
        $forumDAO = new forumDAO(DEBUG);
        if($forumDAO->verifyTopic($idTopic) == false)
            return false;
        else
            return true;
    }


    /**
     * @param $titre
     * @param $description
     * @return bool
     */
    public function createTopic($titre, $description){
        $forumDAO = new forumDAO(DEBUG);
        return $forumDAO->createNewTopic($titre, $description, $_SESSION['idLang']);
    }

    /**
     * @param $login
     * @param $mdp
     * @return bool|user
     */
    public function testConnexionUser($login, $mdp){
        $adminDAO = new administrationDAO(DEBUG);
        return $adminDAO->verifConnexionUser($login, $mdp);
    }


    /**
     * @return array
     */
    public function getUserAll(){
        $adminDAO = new administrationDAO(DEBUG);
        return $adminDAO->getUser();
    }

    /**
     * @param $nom
     * @param $commentaire
     * @param $codeQuartier
     */
    public function addCommentaire($nom, $commentaire, $codeQuartier){
        $commentaireDAO = new commentaireDAO(DEBUG);
        $commentaireDAO->addCommentaire($_SESSION['idLang'], $codeQuartier, $commentaire, $nom);
    }

    /**
     * @param $codeQuartier
     * @return array
     */
    public function getCommentaire($codeQuartier){
        $commentaireDAO = new commentaireDAO(DEBUG);
        return $commentaireDAO->getCommentaire($_SESSION['idLang'], $codeQuartier);
    }

    /**
     * @return bool
     */
    public function getMessageContact(){
        $administrationDAO = new administrationDAO(DEBUG);
        return $administrationDAO->getMessageContactAll();
    }

}


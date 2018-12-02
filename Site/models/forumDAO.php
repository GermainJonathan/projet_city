<?php

require_once PATH_MODELS."DAO.php";
require_once PATH_MODELS."topic.php";
require_once PATH_MODELS."message.php";

// class de discustion avec la bd pour la partie forum
class forumDAO extends DAO
{

    // sort les topics validé par l'admin
    public function getTopicValid(){
        $result = $this->queryAll("SELECT * FROM topic WHERE codeEtat = 2 OR codeEtat = 4");
        $listTopic = array();
        foreach ($result as $temp){
            $res = $this->queryRow("SELECT libelleEtat FROM etatTopic WHERE codeEtat = ?", array($temp['codeEtat']));
            $message = $this->queryRow("SELECT count(*) as message FROM message WHERE codeTopic = ?", array($temp['codeTopic']));
            $listTopic[] = new topic($temp['codeTopic'], $temp['codePays'], $temp['libelleTopic'], $temp['description'], $res['libelleEtat'], $temp['codeEtat'], $temp['date'], $message['message']);
        }
        return $listTopic;

    }

    // sort tous les topics (pour l'admin)
    public function getTopicAll(){
        $result = $this->queryAll("SELECT * FROM topic");
        $listTopic = array();
        foreach ($result as $temp){
            $res = $this->queryRow("SELECT libelleEtat FROM etatTopic WHERE codeEtat = ?", array($temp['codeEtat']));
            $message = $this->queryRow("SELECT count(*) as message FROM message WHERE codeTopic = ?", array($temp['codeTopic']));
            $listTopic[] = new topic($temp['codeTopic'], $temp['codePays'], $temp['libelleTopic'], $temp['description'], $res['libelleEtat'], $temp['codeEtat'], $temp['date'], $message['message']);
        }
        return $listTopic;
    }

    // sort un topic ou false par un ID
    public function getTopicById($idTopic){

        $result = $this->queryRow("SELECT * FROM topic WHERE codeTopic  = ?", array($idTopic));
        $res = $this->queryRow("SELECT libelleEtat FROM etatTopic WHERE codeEtat = ?", array($result['codeEtat']));
        $message = $this->queryRow("SELECT count(*) as message FROM message WHERE codeTopic = ?", array($result['codeTopic']));
        return new topic($result['codeTopic'], $result['codePays'], $result['libelleTopic'], $result['description'], $res['libelleEtat'], $result['codeEtat'], $result['date'], $message['message']);

    }

    // sort les messages d'un topic
    public function getMessageByTopic($idTopic){
        $result = $this->queryAll("SELECT * FROM message WHERE codetopic  = ?", array($idTopic));

        $listMessage = array();
        foreach ($result as $temp) {
            if($temp['codeProfile'] == 0)
                $listMessage[] = new message($temp['codeMessage'], $temp['codeTopic'], $temp['nom'], $temp['message'], $temp['date']);
            else {
                $res = $this->queryRow("SELECT * FROM profile WHERE codeProfile = ?", array($temp['codeProfile']));
                $listMessage[] = new message($temp['codeMessage'], $temp['codeTopic'], $temp['nom'], $temp['message'], $temp['date'], $temp['codeProfile'], $res['libelleProfile']);
            }
        }
        return $listMessage;
    }

    public function getMessageById($id){
        $result = $this->queryRow("SELECT * FROM message WHERE codeMessage = ?", array($id));
        if($result['codeProfile'] == 0)
            $listMessage[] = new message($result['codeMessage'], $result['codeTopic'], $result['nom'], $result['message'], $result['date']);
        else {
            $res = $this->queryRow("SELECT * FROM profile WHERE codeProfile = ?", array($result['codeProfile']));
            $listMessage[] = new message($result['codeMessage'], $result['codeTopic'], $result['nom'], $result['message'], $result['date'], $result['codeProfile'], $res['libelleProfile']);
        }
    }

    // vérifi si un topic exciste et est actif
    public function verifyTopic($idTopic){

        return $this->queryRow("SELECT * FROM topic WHERE codeTopic = ?", array($idTopic));

    }

    public function createNewTopic($titre, $description, $idLang){

        $result = $this->queryRow("SELECT MAX(codeTopic) FROM topic");
        $maxId = $result['codeTopic'] + 1;

        $result = $this->queryBdd("INSERT INTO topic (codeTopic, codePays, libelleTopic, description, codeEtat, date) VALUES (?, ?, ?, ?, ?, CURRENT_DATE)", array($maxId, $idLang, $titre, $description, 1));

        return $result;

    }

    /**
     * fonction qui permet de modifier l'état du topic dans la base de donnée
     * @var etat: réprésente l'état sélectionné par l'administrateur
     * @var idTopic: représente le topic dont l'état va être modifié
     */
    public function setEtatTopicByCode($idTopic, $etat){
        $result = $this->queryBdd("UPDATE topic SET codeEtat = ? WHERE codeTopic  = ?", array($etat, $idTopic));
        if($result)
            return $this->getTopicById($idTopic);
        return false;
    }

    public function sendMessage($idTopic, $nom, $message, $profile = 0){
        $date = date('Y-M-d');
        $result = $this->queryRow("SELECT MAX(codeMessage) as max FROM message");
        $max = ($result['max'] == null)? 0 : $result['max'] + 1;

        $res = $this->queryBdd("INSERT INTO commentaire VALUES (?, ?, ?, ?, ?, ?, ?)",
            array($max, $idTopic, htmlspecialchars(trim($nom)), htmlspecialchars(trim($message)), $date, $profile));

        if($res){
            return $this->getMessageById($max);
        }
        return false;
    }

}
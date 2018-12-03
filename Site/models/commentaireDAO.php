<?php

require_once PATH_MODELS.'DAO.php';
require_once PATH_MODELS.'commentaire.php';

class commentaireDAO extends DAO
{

    public function addCommentaire($codePays, $codeQuartier, $commentaire, $nom){
        $date = date("Y-m-d");
        $result = $this->queryRow("SELECT MAX(codeCommentaire) as max FROM commentaire");
        $max = ($result['max'] == null)? 0 : $result['max'] + 1;

        $res = $this->queryBdd("INSERT INTO commentaire VALUES (?, ?, ?, ?, ?, ?, ?)",
            array($max, $codePays, $codeQuartier, htmlspecialchars(trim($nom)), htmlspecialchars(trim($commentaire)), $date, 1));

        if($res == true){
            $pays = $this->queryRow("SELECT * FROM pays WHERE codePays = ?", array($codePays));
            $quartier = $this->queryRow("SELECT * FROM quartier WHERE codeQuartier  = ?", array($codeQuartier));
            return new commentaire($max, $codePays, $pays['libellePays'], $codeQuartier, $quartier['libelleQuartier'], $nom, $commentaire, $date);
        }
        else
            return false;
    }

    public function getCommentaire($codePays, $codeQuartier){
        $result = $this->queryAll("SELECT * FROM commentaire WHERE codePays = ? AND codeQuartier = ? AND actif = ?",
            array($codePays, $codeQuartier, 1));

        $listCommentaire = array();
        foreach ($result as $temp){
            $pays = $this->queryRow("SELECT * FROM pays WHERE codePays = ?", array($temp['codePays']));
            $quartier = $this->queryRow("SELECT * FROM quartier WHERE codeQuartier  = ?", array($temp['codeQuartier']));
            $listCommentaire[] = new commentaire($temp['codeCommentaire'], $codePays, $pays['libellePays'], $codeQuartier, $quartier['libelleQuartier'], $temp['nom'], $temp['commentaire'], $temp['date']);
        }
        return $listCommentaire;
    }

}
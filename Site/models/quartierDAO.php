<?php

require_once PATH_MODELS.'DAO.php';
require_once PATH_MODELS.'quartier.php';

require_once PATH_MODELS.'activite.php';
//require_once PATH_MODELS.'restaurant.php';
//require_once PATH_MODELS.'monument.php';

class quartierDAO extends DAO
{

    public function getQuartierByLibelle($nomQuartier){
        $result = $this->queryRow("SELECT * FROM quartier WHERE libelleQuartier = ?", array($nomQuartier));
        return new quartier($result['codeQuartier'], $result['libelleQuartier']);
    }

    public function getQuartierByCode($codeQuartier){
        $result = $this->queryRow("SELECT * FROM quartier WHERE codeQuartier = ?", array($codeQuartier));
        return new quartier($result['codeQuartier'], $result['libelleQuartier']);
    }

    public function getActiviteByQuartier($idQuartier){
        $result = $this->queryAll("SELECT * FROM activite WHERE codeQuartier = ?", array($idQuartier));
        $listActivite = array();
        foreach ($result as $temp){
            $quartier = $this->getQuartierByCode($idQuartier);
            $listActivite[] = new activite($temp['codeActivite'], $temp['codePays'], $temp['codeQuartier'], $quartier->getLibelleQuartier(), $temp['codeCategorie'], $temp['nom'], $temp['nomLieux'], $temp['imageActivite'], $temp['commentaire']);
        }
        return $listActivite;
    }

}
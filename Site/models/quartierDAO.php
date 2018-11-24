<?php

require_once PATH_MODELS.'DAO.php';
require_once PATH_MODELS.'quartier.php';

require_once PATH_MODELS.'activite.php';
require_once PATH_MODELS.'restaurant.php';
require_once PATH_MODELS.'monument.php';
require_once PATH_MODELS.'histoire.php';

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

    public function getActiviteByQuartier($libelleQuartier){
        $quartier = $this->getQuartierByLibelle($libelleQuartier);
        $codeQuartier = $quartier->getCodeQuartier();
        $result = $this->queryAll("SELECT * FROM activite WHERE codeQuartier = ?", array($codeQuartier));
        $listActivite = array();
        foreach ($result as $temp){
            $listActivite[] = new activite($temp['codeActivite'], $temp['codePays'], $temp['codeQuartier'], $quartier->getLibelleQuartier(), $temp['codeCategorie'], $temp['nom'], $temp['nomLieux'], $temp['imageActivite'], $temp['commentaire']);
        }
        return $listActivite;
    }

    public function getRestaurantByQuartier($libelleQuartier){
        $quartier = $this->getQuartierByLibelle($libelleQuartier);
        $codeQuartier = $quartier->getCodeQuartier();
        $result = $this->queryAll("SELECT * FROM restaurant WHERE codeQuartier = ?", array($codeQuartier));
        $listRestaurant = array();
        foreach ($result as $temp){
            $listRestaurant[] = new restaurant($temp['codeRestaurant'], $temp['codePays'], $temp['codeQuartier'], $quartier->getLibelleQuartier(), $temp['nom'], $temp['numero'], $temp['imageRestaurant'], $temp['commentaire']);
        }
        return $listRestaurant;
    }

    public function getMonumentByQuartier($libelleQuartier){
        $quartier = $this->getQuartierByLibelle($libelleQuartier);
        $codeQuartier = $quartier->getCodeQuartier();
        $result = $this->queryAll("SELECT * FROM monument WHERE codeQuartier = ?", array($codeQuartier));
        $listMonument = array();
        foreach ($result as $temp){
            $listMonument[] = new monument($temp['codeMonument'], $temp['codePays'], $temp['codeQuartier'], $quartier->getLibelleQuartier(), $temp['libelleMonument'], $temp['dateConstruction'], $temp['architecte'], $temp['imageMonument'], $temp['commentaire']);
        }
        return $listMonument;
    }

    public function getHistoireByQuartier($libelleQuartier){
        $quartier = $this->getQuartierByLibelle($libelleQuartier);
        $codeQuartier = $quartier->getCodeQuartier();
        $result = $this->queryAll("SELECT * FROM histoire WHERE codeQuartier = ?", array($codeQuartier));
        $listHistoire = array();
        foreach ($result as $temp){
            $listHostoire[] = new histoire($temp['codeHistoire'], $temp['codePays'], $temp['codeQuartier'], $quartier->getLibelleQuartier(), $temp['titre'], $temp['imageHistoire'], $temp['commentaire']);
        }
        return $listHistoire;
    }
}
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

    public function getCategorieById($idCategorie){
        return $this->queryRow("SELECT * FROM categorie WHERE codeCategorie = ?", array($idCategorie));
    }

    public function getActiviteByQuartier($idQuartier){
        $result = $this->queryAll("SELECT * FROM activite WHERE codeQuartier = ?", array($idQuartier));
        $listActivite = array();
        foreach ($result as $temp){
            $quartier = $this->getQuartierByCode($idQuartier);
            $categorie = $this->getCategorieById($result['codeCategorie']);
            $listActivite[] = new activite($temp['codeActivite'], $temp['codePays'], $temp['codeQuartier'], $quartier->getLibelleQuartier(), $temp['codeCategorie'], $categorie['libelleCategorie'], $temp['nom'], $temp['nomLieux'], $temp['imageActivite'], $temp['commentaire']);
        }
        return $listActivite;
    }

    public function getRestaurantByQuartier($idQuartier){
        $result = $this->queryAll("SELECT * FROM restaurant WHERE codeQuartier = ?", array($idQuartier));
        $listRestaurant = array();
        foreach ($result as $temp){
            $quartier = $this->getQuartierByCode($idQuartier);
            $listRestaurant[] = new restaurant($temp['codeRestaurant'], $temp['codePays'], $temp['codeQuartier'], $quartier->getLibelleQuartier(), $temp['nom'], $temp['adresse'], $temp['numeroTelephone'], $temp['imageRestaurant'], $temp['commentaire']);
        }
        return $listRestaurant;
    }

    public function getMonumentByQuartier($idQuartier){
        $result = $this->queryAll("SELECT * FROM monument WHERE codeQuartier = ?", array($idQuartier));
        $listMonument = array();
        foreach ($result as $temp){
            $quartier = $this->getQuartierByCode($idQuartier);
            $listMonument[] = new monument($temp['codeMonument'], $temp['codePays'], $temp['codeQuartier'], $quartier->getLibelleQuartier(), $temp['libelleMonument'], $temp['dateConstruction'], $temp['architecte'], $temp['imageMonument'], $temp['commentaire']);
        }
        return $listMonument;
    }

    public function getHistoireByQuartier($idQuartier){
        $result = $this->queryAll("SELECT * FROM histoire WHERE codeQuartier = ?", array($idQuartier));
        $listHistoire = array();
        foreach ($result as $temp){
            $quartier = $this->getQuartierByCode($idQuartier);
            $listHostoire[] = new histoire($temp['codeHistoire'], $temp['codePays'], $temp['codeQuartier'], $quartier->getLibelleQuartier(), $temp['titre'], $temp['imageHistoire'], $temp['commentaire']);
        }
        return $listHistoire;
    }

    public function getHistoireById($idHistoire){
        $result = $this->queryRow("SELECT * FROM histoire WHERE codeHistoire = ?", array($idHistoire));
        if($result) {
            $quartier = $this->getQuartierByCode($result['codeQuartier']);
            return new histoire($result['codeHistoire'], $result['codePays'], $result['codeQuartier'], $quartier->getLibelleQuartier(), $result['titre'], $result['imageHistoire'], $result['commentaire']);
        }
        return false;
    }

    public function getMonumentById($idMonument){
        $result = $this->queryRow("SELECT * FROM monument WHERE codeMonument = ?", array($idMonument));
        if($result) {
            $quartier = $this->getQuartierByCode($result['codeQuartier']);
            return new monument($result['codeMonument'], $result['codePays'], $result['codeQuartier'], $quartier->getLibelleQuartier(), $result['libelleMonument'], $result['imageMonument'], $result['dateConstruction'], $result['architecte'], $result['commentaire']);
        }
        return false;
    }

    public function getActiviteById($idActivite){
        $result = $this->queryRow("SELECT * FROM activite WHERE codeActivite = ?", array($idActivite));
        if($result) {
            $quartier = $this->getQuartierByCode($result['codeQuartier']);
            $categorie = $this->getCategorieById($result['codeCategorie']);
            return new activite($result['codeActivite'], $result['codePays'], $result['codeQuartier'], $quartier->getLibelleQuartier(), $result['codeCategorie'], $categorie['libelleCategorie'], $result['nom'], $result['nomLieux'], $result['imageActivite'], $result['commentaire']);
        }
        return false;
    }

    public function getRestaurantById($idRestaurant){
        $result = $this->queryRow("SELECT * FROM restaurant WHERE codeRestaurant = ?", array($idRestaurant));
        if($result) {
            $quartier = $this->getQuartierByCode($result['codeQuartier']);
            return new restaurant($result['codeRestaurant'], $result['codePays'], $result['codeQuartier'], $quartier->getLibelleQuartier(), $result['nom'], $result['adresse'], $result['numeroTelephone'], $result['imageRestaurant'], $result['commentaire']);
        }
        return false;
    }

    public function setDescriptionHistoire($idHistoire, $description){
        $result = $this->queryBdd("UPDATE histoire SET commentaire = ? WHERE codeHistoire = ?", array($description, $idHistoire));
        if($result)
            return $this->getHistoireById($idHistoire);
        return false;
    }

    public function setDescriptionMonument($idMonument, $description){
        $result = $this->queryBdd("UPDATE monument SET commentaire = ? WHERE codeMonument = ?", array($description, $idMonument));
        if($result)
            return $this->getMonumentById($idMonument);
        return false;
    }

    public function setDescriptionActivite($idActivite, $description){
        $result = $this->queryBdd("UPDATE activite SET commentaire = ? WHERE codeActivite = ?", array($description, $idActivite));
        if($result)
            return $this->getActiviteById($idActivite);
        return false;
    }

    public function setDescriptionRestaurant($idRestaurant, $description){
        $result = $this->queryBdd("UPDATE restaurant SET commentaire = ? WHERE codeRestaurant = ?", array($description, $idRestaurant));
        if($result)
            return $this->getRestaurantById($idRestaurant);
        return false;
    }

}
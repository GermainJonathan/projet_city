<?php

require_once PATH_MODELS.'DAO.php';
require_once PATH_MODELS.'quartier.php';

require_once PATH_MODELS.'activite.php';
require_once PATH_MODELS.'restaurant.php';
require_once PATH_MODELS.'monument.php';
require_once PATH_MODELS.'histoire.php';

class quartierDAO extends DAO
{
    /**
     * @param $nomQuartier
     * @return quartier
     */
    public function getQuartierByLibelle($nomQuartier){
        $result = $this->queryRow("SELECT * FROM quartier WHERE libelleQuartier = ?", array($nomQuartier));
        return new quartier($result['codeQuartier'], $result['libelleQuartier']);
    }

    /**
     * @param $codeQuartier
     * @return quartier
     */
    public function getQuartierByCode($codeQuartier){
        $result = $this->queryRow("SELECT * FROM quartier WHERE codeQuartier = ?", array($codeQuartier));
        return new quartier($result['codeQuartier'], $result['libelleQuartier']);
    }

    /**
     * @param $idCategorie
     * @return bool|mixed
     */
    public function getCategorieById($idCategorie){
        return $this->queryRow("SELECT * FROM categorie WHERE codeCategorie = ?", array($idCategorie));
    }

    /**
     * @param $libelleQuartier
     * @return array
     */
    /**
     * Retourne l'id Lang courant
     */
    public function getLangId() {
        $result = $this->queryRow("SELECT codePays FROM pays WHERE libellePaysCourt = ?", array(LANG));
        return $result['codePays'];
    }

    public function getActiviteByQuartier($libelleQuartier){
        $quartier = $this->getQuartierByLibelle($libelleQuartier);
        $codeQuartier = $quartier->getCodeQuartier();
        $result = $this->queryAll("SELECT * FROM activite WHERE codeQuartier = ? AND codePays = ?", array($codeQuartier, $this->getLangId()));
        $listActivite = array();
        foreach ($result as $temp){
            $categorie = $this->getCategorieById($result['codeCategorie']);
            $listActivite[] = new activite($temp['codeActivite'], $temp['codePays'], $temp['codeQuartier'], $quartier->getLibelleQuartier(), $temp['codeCategorie'], $categorie['libelleCategorie'], $temp['nom'], $temp['nomLieux'], $temp['imageActivite'], $temp['commentaire']);
        }
        return $listActivite;
    }

    /**
     * @param $libelleQuartier
     * @return array
     */
    public function getRestaurantByQuartier($libelleQuartier){
        $quartier = $this->getQuartierByLibelle($libelleQuartier);
        $codeQuartier = $quartier->getCodeQuartier();
        $result = $this->queryAll("SELECT * FROM restaurant WHERE codeQuartier = ? AND codePays = ?", array($codeQuartier, $this->getLangId()));
        $listRestaurant = array();
        foreach ($result as $temp){
            $listRestaurant[] = new restaurant($temp['codeRestaurant'], $temp['codePays'], $temp['codeQuartier'], $quartier->getLibelleQuartier(), $temp['nom'], $temp['adresse'], $temp['numeroTelephone'], $temp['imageRestaurant'], $temp['commentaire']);
        }
        return $listRestaurant;
    }

    /**
     * @param $libelleQuartier
     * @return array
     */
    public function getMonumentByQuartier($libelleQuartier){
        $quartier = $this->getQuartierByLibelle($libelleQuartier);
        $codeQuartier = $quartier->getCodeQuartier();
        $result = $this->queryAll("SELECT * FROM monument WHERE codeQuartier = ? AND codePays = ?", array($codeQuartier, $this->getLangId()));
        $listMonument = array();
        foreach ($result as $temp){
            $listMonument[] = new monument($temp['codeMonument'], $temp['codePays'], $temp['codeQuartier'], $quartier->getLibelleQuartier(), $temp['libelleMonument'], $temp['dateConstruction'], $temp['architecte'], $temp['imageMonument'], $temp['commentaire']);
        }
        return $listMonument;
    }

    /**
     * @param $libelleQuartier
     * @return array
     */
    public function getHistoireByQuartier($libelleQuartier){
        $quartier = $this->getQuartierByLibelle($libelleQuartier);
        $codeQuartier = $quartier->getCodeQuartier();
        $result = $this->queryAll("SELECT * FROM histoire WHERE codeQuartier = ? AND codePays = ?", array($codeQuartier, $this->getLangId()));
        $listHistoire = array();
        foreach ($result as $temp){
            $listHistoire[] = new histoire($temp['codeHistoire'], $temp['codePays'], $temp['codeQuartier'], $quartier->getLibelleQuartier(), $temp['titre'], $temp['imageHistoire'], $temp['commentaire']);
        }
        return $listHistoire;
    }

    /**
     * @param $idHistoire
     * @return bool|histoire
     */
    public function getHistoireById($idHistoire){
        $result = $this->queryRow("SELECT * FROM histoire WHERE codeHistoire = ?", array($idHistoire));
        if($result) {
            $quartier = $this->getQuartierByCode($result['codeQuartier']);
            return new histoire($result['codeHistoire'], $result['codePays'], $result['codeQuartier'], $quartier->getLibelleQuartier(), $result['titre'], $result['imageHistoire'], $result['commentaire']);
        }
        return false;
    }

    /**
     * @param $idMonument
     * @return bool|monument
     */
    public function getMonumentById($idMonument){
        $result = $this->queryRow("SELECT * FROM monument WHERE codeMonument = ?", array($idMonument));
        if($result) {
            $quartier = $this->getQuartierByCode($result['codeQuartier']);
            return new monument($result['codeMonument'], $result['codePays'], $result['codeQuartier'], $quartier->getLibelleQuartier(), $result['libelleMonument'], $result['imageMonument'], $result['dateConstruction'], $result['architecte'], $result['commentaire']);
        }
        return false;
    }

    /**
     * @param $idActivite
     * @return activite|bool
     */
    public function getActiviteById($idActivite){
        $result = $this->queryRow("SELECT * FROM activite WHERE codeActivite = ?", array($idActivite));
        if($result) {
            $quartier = $this->getQuartierByCode($result['codeQuartier']);
            $categorie = $this->getCategorieById($result['codeCategorie']);
            return new activite($result['codeActivite'], $result['codePays'], $result['codeQuartier'], $quartier->getLibelleQuartier(), $result['codeCategorie'], $categorie['libelleCategorie'], $result['nom'], $result['nomLieux'], $result['imageActivite'], $result['commentaire']);
        }
        return false;
    }

    /**
     * @param $idRestaurant
     * @return bool|restaurant
     */
    public function getRestaurantById($idRestaurant){
        $result = $this->queryRow("SELECT * FROM restaurant WHERE codeRestaurant = ?", array($idRestaurant));
        if($result) {
            $quartier = $this->getQuartierByCode($result['codeQuartier']);
            return new restaurant($result['codeRestaurant'], $result['codePays'], $result['codeQuartier'], $quartier->getLibelleQuartier(), $result['nom'], $result['adresse'], $result['numeroTelephone'], $result['imageRestaurant'], $result['commentaire']);
        }
        return false;
    }

    public function setDescriptionHistoire($idHistoire, $description, $titre){
        $result = $this->queryBdd("UPDATE histoire SET commentaire = ?, titre = ? WHERE codeHistoire = ?", array($description, $titre, $idHistoire));
        if($result)
            return $this->getHistoireById($idHistoire);
        return false;
    }

    public function setDescriptionMonument($idMonument, $description, $titre, $architecte){
        $result = $this->queryBdd("UPDATE monument SET commentaire = ?, libelleMonument = ?, architecte = ? WHERE codeMonument = ?", array($description, $titre, $architecte, $idMonument));
        if($result)
            return $this->getMonumentById($idMonument);
        return false;
    }

    public function setDescriptionActivite($idActivite, $description, $titre){
        $result = $this->queryBdd("UPDATE activite SET commentaire = ?, nom = ? WHERE codeActivite = ?", array($description, $titre, $idActivite));
        if($result)
            return $this->getActiviteById($idActivite);
        return false;
    }

    public function setDescriptionRestaurant($idRestaurant, $description, $titre){
        $result = $this->queryBdd("UPDATE restaurant SET commentaire = ?, nom = ? WHERE codeRestaurant = ?", array($description, $titre, $idRestaurant));
        if($result)
            return $this->getRestaurantById($idRestaurant);
        return false;
    }

    /**
     * @param $idHistoire
     * @param $image
     * @return bool|histoire
     */
    public function setImageHistoire($idHistoire, $image){
        $result = $this->queryBdd("UPDATE histoire SET imageHistoire = ? WHERE codeHistoire = ?", array($image, $idHistoire));
        if($result)
            return $this->getHistoireById($idHistoire);
        return false;
    }

    /**
     * @param $idMonument
     * @param $image
     * @return bool|monument
     */
    public function setImageMonument($idMonument, $image){
        $result = $this->queryBdd("UPDATE monument SET imageMonument = ? WHERE codeMonument = ?", array($image, $idMonument));
        if($result)
            return $this->getMonumentById($idMonument);
        return false;
    }

    /**
     * @param $idActivite
     * @param $image
     * @return activite|bool
     */
    public function setImageActivite($idActivite, $image){
        $result = $this->queryBdd("UPDATE activite SET imageActivite = ? WHERE codeActivite = ?", array($image, $idActivite));
        if($result)
            return $this->getActiviteById($idActivite);
        return false;
    }

    /**
     * @param $idRestaurant
     * @param $image
     * @return bool|restaurant
     */
    public function setImageRestaurant($idRestaurant, $image){
        $result = $this->queryBdd("UPDATE restaurant SET imageRestaurant = ? WHERE codeRestaurant = ?", array($image, $idRestaurant));
        if($result)
            return $this->getRestaurantById($idRestaurant);
        return false;
    }

    public function createHistoire($libelleQuartier, $titre, $description){
        $max = $this->queryRow("SELECT MAX(codeHistoire) as max FROM histoire");
        $quartier = $this->getQuartierByLibelle($libelleQuartier);
        $idQuartier = $quartier->getCodeQuartier();
        $result = $this->queryBdd("INSERT INTO histoire VALUES(?, ?, ?, ?, ?, ?)", array($max['max'] +1, $this->getLangId(), $idQuartier, $titre, null, $description));
        if($result)
            return $this->getHistoireById($max['max'] + 1);
        return false;
    }

    public function createMonument($libelleQuartier, $titre, $architecte, $description){
        $max = $this->queryRow("SELECT MAX(codeMonument) as max FROM monument");
        $quartier = $this->getQuartierByLibelle($libelleQuartier);
        $idQuartier = $quartier->getCodeQuartier();
        $result = $this->queryBdd("INSERT INTO monument VALUES(?, ?, ?, ?, ?, ST_GeomFromText(?), ?, ?, ?)", array($max['max'] + 1, $this->getLangId(), $idQuartier, $titre, null, 'POINT(0 0)', null, $architecte, $description));
        if($result)
            return $this->getMonumentById($max['max'] +1);
        return false;
    }

    public function createActivite($libelleQuartier, $titre, $description){
        $max = $this->queryRow("SELECT MAX(codeActivite) as max FROM activite");
        $quartier = $this->getQuartierByLibelle($libelleQuartier);
        $idQuartier = $quartier->getCodeQuartier();
        $result = $this->queryBdd("INSERT INTO activite VALUES(?, ?, ?, ?, ?, ?, ST_GeomFromText(?), ?, ?)", array($max['max'] + 1, $this->getLangId(), $idQuartier, 100, $titre, null, 'POINT(0 0)', null, $description));
        if($result)
            return $this->getActiviteById($max['max'] +1);
        return false;
    }

    public function createRestaurant($libelleQuartier, $titre, $telephone, $adresse, $description){
        $max = $this->queryRow("SELECT MAX(codeRestaurant) as max FROM restaurant");
        $quartier = $this->getQuartierByLibelle($libelleQuartier);
        $idQuartier = $quartier->getCodeQuartier();
        $result = $this->queryBdd("INSERT INTO restaurant VALUES(?, ?, ?, ?, ?, ?, ST_GeomFromText(?), ?, ?)", array($max['max'] + 1, $this->getLangId(), $idQuartier, $titre, $adresse, $telephone, 'POINT(0 0)', null, $description));
        if($result)
            return $this->getRestaurantById($max['max'] +1);
        return false;
    }

    /**
     * @param $idHistoire
     * @return bool
     */
    public function deleteHistoire($idHistoire){
        return $this->queryBdd("DELETE FROM histoire WHERE codeHistoire = ?", array($idHistoire));
    }

    /**
     * @param $idMonument
     * @return bool
     */
    public function deleteMonument($idMonument){
        return $this->queryBdd("DELETE FROM monument WHERE codeMonument = ?", array($idMonument));
    }

    /**
     * @param $idActivite
     * @return bool
     */
    public function deleteActivite($idActivite){
        return $this->queryBdd("DELETE FROM Activite WHERE codeActivite = ?", array($idActivite));
    }

    /**
     * @param $idRestaurant
     * @return bool
     */
    public function deleteRestaurant($idRestaurant){
        return $this->queryBdd("DELETE FROM restaurant WHERE codeRestaurant = ?", array($idRestaurant));
    }
}
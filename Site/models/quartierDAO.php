<?php

require_once PATH_MODELS.'DAO.php';
require_once PATH_MODELS.'quartier.php';
require_once PATH_LIB.'foncBase.php';
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
    private function getCategorieById($idCategorie){
        return $this->queryRow("SELECT * FROM categorie WHERE codeCategorie = ?", array($idCategorie));
    }

    /**
     * @param $libelleQuartier
     * @return array
     */
    public function getActiviteByQuartier($libelleQuartier, $idLang = 1){
        $quartier = $this->getQuartierByLibelle($libelleQuartier);
        $codeQuartier = $quartier->getCodeQuartier();
        $result = $this->queryAll("SELECT *, AsText(coordonnees) as coordonneesT FROM activite WHERE codeQuartier = ? AND codePays = ?", array($codeQuartier, $idLang));
        $listActivite = array();
        foreach ($result as $temp){
            $categorie = $this->getCategorieById($temp['codeCategorie']);
            $activite = new activite($temp['codeActivite'], $temp['codePays'], $temp['codeQuartier'], $quartier->getLibelleQuartier(), $temp['codeCategorie'], $categorie['libelleCategorie'], $temp['nom'], $temp['nomLieux'], $temp['imageActivite'], $temp['commentaire']);
            $activite->setCoordonnees(convertCoordonees($temp["coordonneesT"]));
            $listActivite[] = $activite;
        }
        return $listActivite;
    }

    /**
     * @param $libelleQuartier
     * @return array
     */
    public function getRestaurantByQuartier($libelleQuartier, $idLang = 1){
        $quartier = $this->getQuartierByLibelle($libelleQuartier);
        $codeQuartier = $quartier->getCodeQuartier();
        $result = $this->queryAll("SELECT *, AsText(coordonnees) as coordonneesT FROM restaurant WHERE codeQuartier = ? AND codePays = ?", array($codeQuartier, $idLang));
        $listRestaurant = array();
        foreach ($result as $temp){
            $restaurant = new restaurant($temp['codeRestaurant'], $temp['codePays'], $temp['codeQuartier'], $quartier->getLibelleQuartier(), $temp['nom'], $temp['adresse'], $temp['numeroTelephone'], $temp['imageRestaurant'], $temp['commentaire']);
            $restaurant->setCoordonnees(convertCoordonees($temp["coordonneesT"]));
            $listRestaurant[] = $restaurant;
        }
        return $listRestaurant;
    }

    /**
     * @param $libelleQuartier
     * @return array
     */
    public function getMonumentByQuartier($libelleQuartier, $idLang = 1){
        $quartier = $this->getQuartierByLibelle($libelleQuartier);
        $codeQuartier = $quartier->getCodeQuartier();
        $result = $this->queryAll("SELECT *, AsText(coordonnees) as coordonneesT FROM monument WHERE codeQuartier = ? AND codePays = ?", array($codeQuartier, $idLang));
        $listMonument = array();
        foreach ($result as $temp){
            $monument = new monument($temp['codeMonument'], $temp['codePays'], $temp['codeQuartier'], $quartier->getLibelleQuartier(), $temp['libelleMonument'], $temp['dateConstruction'], $temp['architecte'], $temp['imageMonument'], $temp['commentaire']);
            $monument->setCoordonnees(convertCoordonees($temp["coordonneesT"]));
            $listMonument[] = $monument;
        }
        return $listMonument;
    }

    /**
     * @param $libelleQuartier
     * @return array
     */
    public function getHistoireByQuartier($libelleQuartier, $idLang = 1){
        $quartier = $this->getQuartierByLibelle($libelleQuartier);
        $codeQuartier = $quartier->getCodeQuartier();
        $result = $this->queryAll("SELECT * FROM histoire WHERE codeQuartier = ? AND codePays = ?", array($codeQuartier, $idLang));
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
        $result = $this->queryRow("SELECT *, AsText(coordonnees) as coordonneesT FROM monument WHERE codeMonument = ?", array($idMonument));
        if($result) {
            $quartier = $this->getQuartierByCode($result['codeQuartier']);
            $monument =  new monument($result['codeMonument'], $result['codePays'], $result['codeQuartier'], $quartier->getLibelleQuartier(), $result['libelleMonument'], $result['imageMonument'], $result['dateConstruction'], $result['architecte'], $result['commentaire']);
            $monument->setCoordonnees(convertCoordonees($result["coordonneesT"]));
            return $monument;
        }
        return false;
    }

    /**
     * @param $idActivite
     * @return activite|bool
     */
    public function getActiviteById($idActivite){
        $result = $this->queryRow("SELECT *, AsText(coordonnees) as coordonneesT FROM activite WHERE codeActivite = ?", array($idActivite));
        if($result) {
            $quartier = $this->getQuartierByCode($result['codeQuartier']);
            $categorie = $this->getCategorieById($result['codeCategorie']);
            $activite =  new activite($result['codeActivite'], $result['codePays'], $result['codeQuartier'], $quartier->getLibelleQuartier(), $result['codeCategorie'], $categorie['libelleCategorie'], $result['nom'], $result['nomLieux'], $result['imageActivite'], $result['commentaire']);
            $activite->setCoordonnees(convertCoordonees($result["coordonneesT"]));
            return $activite;
        }
        return false;
    }

    /**
     * @param $idRestaurant
     * @return bool|restaurant
     */
    public function getRestaurantById($idRestaurant){
        $result = $this->queryRow("SELECT *, AsText(coordonnees) as coordonneesT FROM restaurant WHERE codeRestaurant = ?", array($idRestaurant));
        if($result) {
            $quartier = $this->getQuartierByCode($result['codeQuartier']);
            $restaurant =  new restaurant($result['codeRestaurant'], $result['codePays'], $result['codeQuartier'], $quartier->getLibelleQuartier(), $result['nom'], $result['adresse'], $result['numeroTelephone'], $result['imageRestaurant'], $result['commentaire']);
            $restaurant->setCoordonnees(convertCoordonees($result["coordonneesT"]));
            return $restaurant;
        }
        return false;
    }

    /**
     * @param $idHistoire
     * @param $description
     * @param $titre
     * @return bool|histoire
     */
    public function setDescriptionHistoire($idHistoire, $description, $titre){
        $result = $this->queryBdd("UPDATE histoire SET commentaire = ?, titre = ? WHERE codeHistoire = ?", array($description, $titre, $idHistoire));
        if($result)
            return $this->getHistoireById($idHistoire);
        return false;
    }

    /**
     * @param $idMonument
     * @param $description
     * @param $titre
     * @param $architecte
     * @return bool|monument
     */
    public function setDescriptionMonument($idMonument, $description, $titre, $architecte, $coordonnees){
        $result = $this->queryBdd("UPDATE monument SET commentaire = ?, libelleMonument = ?, architecte = ?, coordonnees = ST_GeomFromText(?) WHERE codeMonument = ?", array($description, $titre, $architecte, $coordonnees, $idMonument));
        if($result)
            return $this->getMonumentById($idMonument);
        return false;
    }

    /**
     * @param $idActivite
     * @param $description
     * @param $titre
     * @return activite|bool
     */
    public function setDescriptionActivite($idActivite, $description, $titre, $coordonnees){
        $result = $this->queryBdd("UPDATE activite SET commentaire = ?, nom = ?, coordonnees = ST_GeomFromText(?) WHERE codeActivite = ?", array($description, $titre, $coordonnees, $idActivite));
        if($result)
            return $this->getActiviteById($idActivite);
        return false;
    }

    /**
     * @param $idRestaurant
     * @param $description
     * @param $titre
     * @return bool|restaurant
     */
    public function setDescriptionRestaurant($idRestaurant, $description, $titre, $coordonnees){
        $result = $this->queryBdd("UPDATE restaurant SET commentaire = ?, nom = ?, coordonnees = ST_GeomFromText(?) WHERE codeRestaurant = ?", array($description, $titre, $coordonnees, $idRestaurant));
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

    /**
     * @param $libelleQuartier
     * @param $titre
     * @param $description
     * @return bool|histoire
     */
    public function createHistoire($libelleQuartier, $titre, $description){
        $max = $this->queryRow("SELECT MAX(codeHistoire) as max FROM histoire");
        $quartier = $this->getQuartierByLibelle($libelleQuartier);
        $idQuartier = $quartier->getCodeQuartier();
        $result = $this->queryBdd("INSERT INTO histoire VALUES(?, ?, ?, ?, ?, ?)", array($max['max'] +1, $this->getLangId(), $idQuartier, $titre, null, $description));
        if($result)
            return $this->getHistoireById($max['max'] + 1);
        return false;
    }

    /**
     * @param $libelleQuartier
     * @param $titre
     * @param $architecte
     * @param $description
     * @return bool|monument
     */
    public function createMonument($libelleQuartier, $titre, $architecte, $description, $coordonnees){
        $max = $this->queryRow("SELECT MAX(codeMonument) as max FROM monument");
        $quartier = $this->getQuartierByLibelle($libelleQuartier);
        $idQuartier = $quartier->getCodeQuartier();
        $result = $this->queryBdd("INSERT INTO monument VALUES(?, ?, ?, ?, ?, ST_GeomFromText(?), ?, ?, ?)", array($max['max'] + 1, $this->getLangId(), $idQuartier, $titre, null, $coordonnees, null, $architecte, $description));
        if($result)
            return $this->getMonumentById($max['max'] +1);
        return false;
    }

    /**
     * @param $libelleQuartier
     * @param $titre
     * @param $description
     * @return activite|bool
     */
    public function createActivite($libelleQuartier, $titre, $description, $coordonnees){
        $max = $this->queryRow("SELECT MAX(codeActivite) as max FROM activite");
        $quartier = $this->getQuartierByLibelle($libelleQuartier);
        $idQuartier = $quartier->getCodeQuartier();
        $result = $this->queryBdd("INSERT INTO activite VALUES(?, ?, ?, ?, ?, ?, ST_GeomFromText(?), ?, ?)", array($max['max'] + 1, $this->getLangId(), $idQuartier, 100, $titre, null, $coordonnees, null, $description));
        if($result)
            return $this->getActiviteById($max['max'] +1);
        return false;
    }

    /**
     * @param $libelleQuartier
     * @param $titre
     * @param $telephone
     * @param $adresse
     * @param $description
     * @return bool|restaurant
     */
    public function createRestaurant($libelleQuartier, $titre, $telephone, $adresse, $description, $coordonnees){
        $max = $this->queryRow("SELECT MAX(codeRestaurant) as max FROM restaurant");
        $quartier = $this->getQuartierByLibelle($libelleQuartier);
        $idQuartier = $quartier->getCodeQuartier();
        $result = $this->queryBdd("INSERT INTO restaurant VALUES(?, ?, ?, ?, ?, ?, ST_GeomFromText(?), ?, ?)", array($max['max'] + 1, $this->getLangId(), $idQuartier, $titre, $adresse, $telephone, $coordonnees, null, $description));
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

        /**
     * Renvoie un tableau contenant les données des Monuments enregistrés par quartier
     * @var string quarter nom du quartier
     * @return array monument[]
     */
    public function getDataMonumentByQuarter($quarter) {
        $sql = "SELECT mon.codeMonument as id, mon.codeQuartier as idQuartier, mon.libelleMonument as name, mon.imageMonument as images, AsText(mon.coordonnees) as coordonees, DATE_FORMAT(mon.dateConstruction, '%d %m %Y') as dateConstruction, mon.architecte, mon.commentaire
                FROM monument mon
                INNER JOIN quartier qua ON mon.codeQuartier = qua.codeQuartier
                WHERE qua.libelleQuartier = :quartier
                AND mon.codePays = 1";
        $monumentResult = $this->queryAll($sql, array('quartier' => $quarter));
        if(!$monumentResult) {
            error_log('Monument - Erreur lors de l\'execution de la requête');
        } else {
            foreach($monumentResult as $key => $item) {
                $monumentResult[$key]['coordonees'] = convertCoordonees($item['coordonees']);
            }
        }
        return $monumentResult;
    }

    /**
     * Renvoie un tableau contenant les données des Restaurants enregistrés par quartier
     * @var string quarter nom du quartier
     * @return array restaurant[]
     */
    public function getDataRestaurantByQuarter($quarter) {
        $sql = "SELECT res.codeRestaurant as id, res.codeQuartier as idQuartier, res.imageRestaurant as images, res.nom as name, AsText(res.coordonnees) as coordonees, res.numeroTelephone, res.commentaire
                FROM restaurant res
                INNER JOIN quartier qua ON res.codeQuartier = qua.codeQuartier
                WHERE qua.libelleQuartier = :quartier
                AND res.codePays = 1";
        $restaurantResult = $this->queryAll($sql, array('quartier' => $quarter));
        if(!$restaurantResult) {
            error_log('Restaurant - Erreur lors de l\'execution de la requête');
        } else {
            foreach ($restaurantResult as $key => $item) {
                $restaurantResult[$key]['coordonees'] = convertCoordonees($item["coordonees"]);
            }
        }
        return $restaurantResult;
    }

    /**
     * Renvoie un tableau contenant les données des Activités enregistrés par quartier
     * @var string quarter nom du quartier
     * @return array monument[]
     */
    public function getDataActiviteByQuarter($quarter) {
        $sql = "SELECT act.codeActivite as id, act.codeQuartier as idQuartier, act.codeCategorie as idCategorie, act.nom as name, act.nomLieux as adresse, AsText(act.coordonnees) as coordonees, act.imageActivite as images, act.commentaire
                FROM activite act
                INNER JOIN quartier qua ON act.codeQuartier = qua.codeQuartier
                WHERE qua.libelleQuartier = :quartier
                AND act.codePays = 1";
        $activiteResult = $this->queryAll($sql, array('quartier' => $quarter));
        if(!$activiteResult) {
            error_log('Activité - Erreur lors de l\'execution de la requête');
        } else {
            foreach ($activiteResult as $key => $item) {
                $activiteResult[$key]['coordonees'] = convertCoordonees($item["coordonees"]);
            }
        }
        return $activiteResult;
    }

    /**
     * Renvoie tout les patrimoines d'un quartier sous forme de tableau 2D
     * 
     * @var string quarter nom du quartier 
     * @return array [activites[], restaurants[], monuments[]]
     */
    public function getAllDataByQuarter($quarter) {
        $activites = $this->getDataActiviteByQuarter($quarter);
        $restaurants = $this->getDataRestaurantByQuarter($quarter);
        $monuments = $this->getDataMonumentByQuarter($quarter);
        return array('activites' => $activites, 'restaurants' => $restaurants, 'monuments' => $monuments);
    }
}
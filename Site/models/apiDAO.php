<?php
/**
 * Modèle gérant la connexion entre la base et l'API
 */

require_once 'DAO.php';
require_once PATH_LIB.'foncBase.php';

class Api extends DAO
{

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
            $monumentResult = array();
            foreach ($monumentResult as $item) {
                $monumentResult[] = convertCoordonees($item["coordonnees"]);
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
            $restaurantResult = array();
            foreach ($restaurantResult as $item) {
                $restaurantResult[] = convertCoordonees($item["coordonnees"]);
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
            $activiteResult = array();
            foreach ($activiteResult as $item) {
                $activiteResult[] = convertCoordonees($item["coordonnees"]);
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
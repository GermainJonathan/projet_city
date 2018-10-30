<?php
/**
 * Modèle gérant la connexion entre la base et l'API
 */

require_once 'DAO.php';

class Api extends DAO
{
    /**
     * @var array $arrayToConvert
     * @return array $result
     */
    private function convertCoordonees($arrayToConvert) {
        $result = array();
        foreach($arrayToConvert as $key => $elem) {
            preg_match("/\d*.\d* \d*.\d*/", $elem['coordonees'], $chaine);
            $chaine[0] = explode(' ', $chaine[0]);
            $arrayToConvert[$key]['coordonees'] = ['x' => floatval($chaine[0][0]), 'y' => floatval($chaine[0][1])];
        }
        return $arrayToConvert;
    }

    /**
     * Renvoie un tableau contenant les données des Monuments enregistrés par quartier
     * @var string quarter nom du quartier
     * @return array monument[]
     */
    public function getDataMonumentByQuarter($quarter) {
        $sql = "SELECT mon.codeMonument as id, mon.codeQuartier as idQuartier, mon.libelleMonument, mon.imageMonument, AsText(mon.coordonnees) as coordonees, DATE_FORMAT(mon.dateConstruction, '%d %m %Y') as dateConstruction, mon.architecte, mon.commentaire
                FROM monument mon
                INNER JOIN quartier qua ON mon.codeQuartier = qua.codeQuartier
                WHERE qua.libelleQuartier = :quartier";
        $monumentResult = $this->queryAll($sql, array('quartier' => $quarter));
        // TODO: Remonter d'erreur BDD - Notification TOAST
        // FIXME: Compléter le if avec isArray
        if(!$monumentResult) {
            error_log('Monument - Erreur lors de l\'execution de la requête');
        } else {
            $monumentResult = $this->convertCoordonees($monumentResult);
        }
        return $monumentResult;
    }

    /**
     * Renvoie un tableau contenant les données des Restaurants enregistrés par quartier
     * @var string quarter nom du quartier
     * @return array restaurant[]
     */
    public function getDataRestaurantByQuarter($quarter) {
        $sql = "SELECT res.codeRestaurant as id, res.codeQuartier as idQuartier, res.nom, AsText(res.coordonnees) as coordonees, res.numeroTelephone, res.commentaire
                FROM restaurant res
                INNER JOIN quartier qua ON res.codeQuartier = qua.codeQuartier
                WHERE qua.libelleQuartier = :quartier";
        $restaurantResult = $this->queryAll($sql, array('quartier' => $quarter));
        // TODO: Remonter d'erreur BDD - Notification TOAST
        // FIXME: Compléter le if avec isArray
        if(!$restaurantResult) {
            error_log('Restaurant - Erreur lors de l\'execution de la requête');
        } else {
            $restaurantResult = $this->convertCoordonees($restaurantResult);
        }
        return $restaurantResult;
    }

    /**
     * Renvoie un tableau contenant les données des Activités enregistrés par quartier
     * @var string quarter nom du quartier
     * @return array monument[]
     */
    public function getDataActiviteByQuarter($quarter) {
        // TODO: Terminer la requête
        $sql = "SELECT act.codeActivite as id, act.codeQuartier as idQuartier, act.codeCategorie as idCategorie, act.nom as titreActivite, act.nomLieux as adresse, AsText(act.coordonnees) as coordonees, act.commentaire
                FROM activite act
                INNER JOIN quartier qua ON act.codeQuartier = qua.codeQuartier
                WHERE qua.libelleQuartier = :quartier";
        $activiteResult = $this->queryAll($sql, array('quartier' => $quarter));
        // TODO: Remonter d'erreur BDD - Notification TOAST
        // FIXME: Compléter le if avec isArray
        if(!$activiteResult) {
            error_log('Activité - Erreur lors de l\'execution de la requête');
        } else {
            $activiteResult = $this->convertCoordonees($activiteResult);
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
<?php
/**
 * Modèle gérant la connexion entre la base et l'API
 */

require_once 'DAO.php';

class Api extends DAO
{
    // TODO: Model Monument
    /**
     * Renvoie un tableau contenant les données des Monuments enregistrés par quartier
     * @var quarter nom du quartier
     * @return array monument[]
     */
    public function getDataMonumentByQuarter($quarter) {
        $sql = "SELECT mon.libelleMonument, mon.imageMonument, AsText(mon.coordonnees) as coordonees, DATE_FORMAT(mon.dateConstruction, '%d %m %Y'), mon.architecte
                FROM monument mon
                INNER JOIN quartier qua ON mon.codeQuartier = qua.codeQuartier
                WHERE qua.libelleQuartier = :quartier";
        $monumentResult = $this->queryAll($sql, array('quartier' => $quarter));
        // TODO: Remonter d'erreur BDD - Notification TOAST
        if(!$monumentResult) {
            error_log('Monument - Erreur lors de l\'execution de la requête');
        }
        return $monumentResult;
    }

    // TODO: Model Restaurant
    /**
     * Renvoie un tableau contenant les données des Restaurants enregistrés par quartier
     * @var quarter nom du quartier
     * @return array restaurant[]
     */
    public function getDataRestaurantByQuarter($quarter) {
        // TODO: Terminer la requête
        $sql = "SELECT AsText(res.coordonnees) as coordonees, DATE_FORMAT(res.dateConstruction, '%d %m %Y')
                FROM restaurant res
                INNER JOIN quartier qua ON res.codeQuartier = qua.codeQuartier
                WHERE qua.libelleQuartier = :quartier";
        $restaurantResult = $this->queryAll($sql, array('quartier' => $quarter));
        // TODO: Remonter d'erreur BDD - Notification TOAST
        if(!$restaurantResult) {
            error_log('Restaurant - Erreur lors de l\'execution de la requête');
        }
        return $restaurantResult;
    }

    // TODO: Model Activité
    /**
     * Renvoie un tableau contenant les données des Activités enregistrés par quartier
     * @var quarter nom du quartier
     * @return array monument[]
     */
    public function getDataActiviteByQuarter($quarter) {
        // TODO: Terminer la requête
        $sql = "SELECT AsText(act.coordonnees) as coordonees, DATE_FORMAT(act.dateConstruction, '%d %m %Y')
                FROM activite act
                INNER JOIN quartier qua ON act.codeQuartier = qua.codeQuartier
                WHERE qua.libelleQuartier = :quartier";
        $activiteResult = $this->queryAll($sql, array('quartier' => $quarter));
        // TODO: Remonter d'erreur BDD - Notification TOAST
        if(!$activiteResult) {
            error_log('Activité - Erreur lors de l\'execution de la requête');
        }
        return $activiteResult;
    }

}
<?php
/**
 * Modèle gérant la connexion entre la base et l'API
 */

require_once PATH_MODELS.'apiDAO.php';

class Api extends DAO
{
    /**
     * Renvoie un tableau contenant toute les données ( activités, monument, restaurant ) d'un quartier
     * @var quarter nom du quartier
     * @return array (monument[], activité[], restaurant[])
     */
    public function getDataByQuarter($quarter) {
        $monumentResult = $this->queryAll("SELECT * FROM monument mon
        INNER JOIN quartier qua ON mon.codeQuartier = qua.codeQuartier
        WHERE qua.libelleQuartier = :quartier", array('quarter' => $quarter));
        error_log('$monumentResult : '.print_r($monumentResult,true));
        $activiteResult = $this->queryAll("SELECT * FROM activite mon, quartier qua
        INNER JOIN mon.codeQuartier = qua.codeQuartier
        WHERE qua.libelleQuartier = :quartier", array('quarter' => $quarter));
        $restaurantResult = $this->queryAll("SELECT * FROM restaurant mon, quartier qua
        INNER JOIN mon.codeQuartier = qua.codeQuartier
        WHERE qua.libelleQuartier = :quartier", array('quarter' => $quarter));
        
    }

    private function whatQuarterCode($quarter) {
        $codeQuartier = array(
            'perrache' => $quarter
        );
    }
}
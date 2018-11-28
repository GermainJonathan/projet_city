<?php

require_once PATH_MODELS."DAO.php";
require_once PATH_MODELS.'pays.php';

// classe de communicaton avec la bd pour les pays et le choix de la langue
class paysDAO extends DAO
{

    /**
     * @return array
     */
    public function getPays(){

        $result = $this->queryAll("SELECT * FROM pays");

        $listPays = array();
        foreach($result as $temp) {
            $listPays[] =  new pays($temp['codePays'], $temp['libellePays'], $temp['libellePaysCourt'], $temp['fichier']);
        }

        return $listPays;
    }
}
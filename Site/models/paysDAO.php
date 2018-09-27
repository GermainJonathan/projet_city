<?php

require_once PATH_MODELS."DAO.php";
require_once PATH_MODELS.'pays.php';

class paysDAO extends DAO
{

    public function getPays(){

        $result = $this->queryAll("SELECT * FROM pays");

        $listPays = array();
        for($i = 0; $i<(sizeof($result)); $i++)
        {
            $pays = new pays($result[$i][0], $result[$i][1], $result[$i][2], $result[$i][3]);
            $listPays[] = $pays;
        }

        return $listPays;
    }
}
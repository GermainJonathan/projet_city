<?php

require_once PATH_MODELS.'DAO.php';
require_once PATH_MODELS.'quartier.php';

class quartierDAO extends DAO
{

    public function getQuartierByLibelle($nomQuartier){
        $result = $this->queryRow("SELECT * FROM quartier WHERE libllelQuartier = ?", array($nomQuartier));
        return new quartier($result['codeQuartier'], $result['libelleQuartier']);
    }

    public function getQuartierByCode($codeQuartier){
        $result = $this->queryRow("SELECT * FROM quartier WHERE codeQuartier = ?", array($codeQuartier));
        return new quartier($result['codeQuartier'], $result['libelleQuartier']);
    }

}
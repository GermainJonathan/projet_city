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

    public function getLibelleCourt(){
        $result = $this->queryAll("SELECT libellePaysCourt FROM pays");
        $array = array();
        foreach ($result as $item)
            $array[] = $item["libellePaysCourt"];
        return $array;
    }

    public function getPaysById($id){
        $result = $this->queryRow("SELECT * FROM pays WHERE codePays = ?", array($id));

        return new pays($result['codePays'], $result['libellePays'], $result['libellePaysCourt'], $result['fichier']);
    }

    public function addPays($libelle, $libelleCourt, $fichier){
        $max = $this->queryRow("SELECT MAX(codePays) as max FROM pays");
        $max = ($max['max'] == null) ? 1 : $max['max'];
        $result =  $this->queryBdd("INSERT INTO pays VALUES (?, ?, ?, ?)", array($max, $libelle, $libelleCourt, $fichier));
        if($result)
            return $this->getPaysById($max);
        else
            return $result;
    }
}
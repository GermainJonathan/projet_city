<?php

// class des pays pour e choix de la langue
class pays
{

    private $_id;
    private $_libelle;
    private $_libelleCourt;
    private $_fichier;

    public function __construct($id, $libelle, $libelleCourt, $fichier)
    {
        $this->_id = $id;
        $this->_libelle = $libelle;
        $this->_libelleCourt = $libelleCourt;
        $this->_fichier = $fichier;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getLibelle()
    {
        return $this->_libelle;
    }

    public function getLibelleCourt()
    {
        return $this->_libelleCourt;
    }

    public function getFichier()
    {
        return $this->_fichier;
    }

    public function __toString(){
        return $this->_id." ".$this->_libelle;
    }
}
<?php

// class des pays pour le choix de la langue
class pays
{

    private $_id;
    private $_libelle;
    private $_libelleCourt;
    private $_fichier;

    /**
     * pays constructor.
     * @param $id
     * @param $libelle
     * @param $libelleCourt
     * @param $fichier
     */
    public function __construct($id, $libelle, $libelleCourt, $fichier)
    {
        $this->_id = $id;
        $this->_libelle = $libelle;
        $this->_libelleCourt = $libelleCourt;
        $this->_fichier = $fichier;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->_libelle;
    }

    /**
     * @return mixed
     */
    public function getLibelleCourt()
    {
        return $this->_libelleCourt;
    }

    /**
     * @return mixed
     */
    public function getFichier()
    {
        return $this->_fichier;
    }

    /**
     * @return string
     */
    public function __toString(){
        return $this->_id." ".$this->_libelle;
    }

    public function toArray(){
        return array(
            "codePays" => $this->_id,
            "libelle" => $this->_libelle,
            "libelleCourt" => $this->_libelleCourt,
            "fichier" => $this->_fichier
        );
    }
}
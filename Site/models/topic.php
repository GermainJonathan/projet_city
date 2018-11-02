<?php

// class des topics du forum
class topic
{

    private $_id;
    private $_idLang;
    private $_titre;
    private $_description;
    private $_etat;
    private $_codeEtat;
    private $_date;


    public function __construct($id, $idLang, $titre, $description, $etat, $codeEtat, $date)
    {
        $this->_id = $id;
        $this->_idLang = $idLang;
        $this->_titre = $titre;
        $this->_description = $description;
        $this->_etat = $etat;
        $this-> _codeEtat = $codeEtat;
        $this->_date = $date;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getIdLang()
    {
        return $this->_idLang;
    }

    public function getTitre()
    {
        return $this->_titre;
    }

    public function getDescription()
    {
        return $this->_description;
    }

    public function getEtat()
    {
        return $this->_etat;
    }

    public function getCodeEtat()
    {
        return $this ->_codeEtat;
    }

    public function setCodeEtat($codeEtat){

        $this->_codeEtat = $codeEtat;

    }

    public function getDate()
    {
        return $this->_date;
    }

    public function __toString()
    {
        return $this->_id.$this->_idLang.$this->_titre.$this->_description.$this->_etat.$this->_date;
    }
}
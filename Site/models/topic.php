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
    private $_actionValid;
    private $_codeActionValid;
    private $_actionRefuse;
    private $_codeActionRefuse;


    public function __construct($id, $idLang, $titre, $description, $etat, $codeEtat, $date)
    {
        $this->_id = $id;
        $this->_idLang = $idLang;
        $this->_titre = $titre;
        $this->_description = $description;
        $this->_etat = $etat;
        $this->_codeEtat = $codeEtat;
        $this->_date = $date;
        $valid = getActionValidByEtat($codeEtat);
        $this->_actionValid = $valid['action'];
        $this->_codeActionValid = $valid['codeAction'];
        $refuse = getActionRefuseByEtat($codeEtat);
        $this->_actionRefuse = $refuse['action'];
        $this->_codeActionRefuse = $refuse['codeAction'];
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

    public function getDate()
    {
        return $this->_date;
    }

    /**
     * @return mixed
     */
    public function getActionValid()
    {
        return $this->_actionValid;
    }

    /**
     * @return mixed
     */
    public function getActionRefuse()
    {
        return $this->_actionRefuse;
    }

    /**
     * @return mixed
     */
    public function getCodeActionValid()
    {
        return $this->_codeActionValid;
    }

    /**
     * @return mixed
     */
    public function getCodeActionRefuse()
    {
        return $this->_codeActionRefuse;
    }

    public function __toString()
    {
        return $this->_id.$this->_idLang.$this->_titre.$this->_description.$this->_etat.$this->_date;
    }
}
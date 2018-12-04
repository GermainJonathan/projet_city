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
    private $_nbMessage;


    /**
     * topic constructor.
     * @param $id
     * @param $idLang
     * @param $titre
     * @param $description
     * @param $etat
     * @param $codeEtat
     * @param $date
     * @param $nbMessage
     */
    public function __construct($id, $idLang, $titre, $description, $etat, $codeEtat, $date, $nbMessage)
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
        $this->_nbMessage = $nbMessage;
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
    public function getIdLang()
    {
        return $this->_idLang;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->_titre;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * @return mixed
     */
    public function getEtat()
    {
        return $this->_etat;
    }

    /**
     * @return mixed
     */
    public function getCodeEtat()
    {
        return $this ->_codeEtat;
    }

    /**
     * @return mixed
     */
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


    /**
     * @return mixed
     */
    public function getNbMessage()
    {
        return $this->_nbMessage;
    }

    /**
     * @param mixed $nbMessage
     */
    public function setNbMessage($nbMessage): void
    {
        $this->_nbMessage = $nbMessage;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->_id.$this->_idLang.$this->_titre.$this->_description.$this->_etat.$this->_date;
    }

    /**
     * @return array
     */
    public function toArray(){
        return array ('codeTopic' => $this->_id,
        'codeLang' => $this->_idLang,
        'titre' => $this->_titre,
        'description' => $this->_description,
        'etat' => $this->_etat,
        'codeEtat' => $this->_codeEtat,
        'date' => $this->_date,
        'actionValid' => $this->_actionValid,
        'codeActionValid' => $this->_codeActionValid,
        'actionRefuse' => $this->_actionRefuse,
        'codeActionRefuse' => $this->_codeActionRefuse,
        'nbMessage' => $this->_nbMessage,
        );
    }
}
<?php

// class des messages d'un topic du forum
class message
{

    private $_idMessage;
    private $_idTopic;
    private $_nom;
    private $_message;
    private $_date;
    private $_codeProfile;
    private $_profile;


    /**
     * message constructor.
     * @param $idMessage
     * @param $idTopic
     * @param $nom
     * @param $message
     * @param $date
     * @param null $codeProfile
     * @param null $profile
     */
    public function __construct($idMessage, $idTopic, $nom, $message, $date, $codeProfile = null, $profile = null)
    {
        $this->_idMessage = $idMessage;
        $this->_idTopic = $idTopic;
        $this->_nom = $nom;
        $this->_message = $message;
        $this->_date = $date;
        $this->_codeProfile = $codeProfile;
        $this->_profile = $profile;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->_nom;
    }

    /**
     * @return null
     */
    public function getCodeProfile()
    {
        return $this->_codeProfile;
    }

    /**
     * @return null
     */
    public function getProfile()
    {
        return $this->_profile;
    }

    /**
     * @return mixed
     */
    public function getIdMessage()
    {
        return $this->_idMessage;
    }

    /**
     * @return mixed
     */
    public function getIdTopic()
    {
        return $this->_idTopic;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->_message;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->_date;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->_idMessage.$this->_nom.$this->_message.$this->_date;
    }


}
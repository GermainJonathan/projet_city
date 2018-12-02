<?php
require_once PATH_MODELS.'administrationDAO.php';

class messageContact
{

    private $_codeMessage;
    private $_nom;
    private $_prenom;
    private $_mail;
    private $_objet;
    private $_message;
    private $_date;


    /**
     * messageContact constructor.
     * @param $codeMessage
     * @param $nom
     * @param $prenom
     * @param $mail
     * @param $objet
     * @param $message
     * @param $date
     */
    public function __construct($codeMessage, $nom, $prenom, $mail, $objet, $message, $date)
    {
        $this->_codeMessage = $codeMessage;
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_mail = $mail;
        $this->_objet = $objet;
        $this->_message = $message;
        $this->_date = $date;
    }

    /**
     * @return mixed
     */
    public function getCodeMessage()
    {
        return $this->_codeMessage;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->_nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->_prenom;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->_mail;
    }

    /**
     * @return mixed
     */
    public function getObjet()
    {
        return $this->_objet;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->_message;
    }

    public function toArray(){
        return  array(
            $this->_codeMessage,
            $this->_nom,
            $this->_prenom,
            $this->_mail,
            $this->_objet,
            $this->_message,
            $this->_date
        );
    }

}
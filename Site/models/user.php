<?php

class user
{
    private $_codeUser;
    private $_nom;
    private $_mail;
    private $_codeProfile;
    private $_profile;

    public function __construct($codeUser, $nom, $mail, $codeProfile, $profile)
    {
        $this->_codeUser = $codeUser;
        $this->_nom = $nom;
        $this->_mail = $mail;
        $this->_codeProfile = $codeProfile;
        $this->_profile = $profile;
    }


    public function getCodeUser()
    {
        return $this->_codeUser;
    }

    public function getNom()
    {
        return $this->_nom;
    }

    public function getMail()
    {
        return $this->_mail;
    }

    public function getProfile()
    {
        return $this->_profile;
    }
}
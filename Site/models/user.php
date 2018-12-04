<?php

class user
{
    private $_codeUser;
    private $_nom;
    private $_mail;
    private $_codeProfile;
    private $_profile;

    /**
     * user constructor.
     * @param $codeUser
     * @param $nom
     * @param $mail
     * @param $codeProfile
     * @param $profile
     */
    public function __construct($codeUser, $nom, $mail, $codeProfile, $profile)
    {
        $this->_codeUser = $codeUser;
        $this->_nom = $nom;
        $this->_mail = $mail;
        $this->_codeProfile = $codeProfile;
        $this->_profile = $profile;
    }

    /**
     * @return mixed
     */
    public function getCodeProfile()
    {
        return $this->_codeProfile;
    }

    /**
     * @return mixed
     */
    public function getCodeUser()
    {
        return $this->_codeUser;
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
    public function getMail()
    {
        return $this->_mail;
    }

    /**
     * @return mixed
     */
    public function getProfile()
    {
        return $this->_profile;
    }
}
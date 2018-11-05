<?php

class user
{
    private $_codeUser;
    private $_nom;
    private $_proile;
    private $_codeProfile;

    public function __construct($codeUser, $nom, $proile, $codeProfile)
    {
        $this->_codeUser = $codeUser;
        $this->_nom = $nom;
        $this->_proile = $proile;
        $this->_codeProfile = $codeProfile;
    }


    public function getNom()
    {
        return $this->_nom;
    }

    public function getProile()
    {
        return $this->_proile;
    }
}
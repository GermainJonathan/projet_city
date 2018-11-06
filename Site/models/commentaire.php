<?php

class commentaire
{

    private $_codeCommentaire;
    private $_codePays;
    private $_pays;
    private $_codeQuartier;
    private $_quartier;
    private $_commentaire;
    private $_date;


    public function __construct($codeCommentaire, $codePays, $pays, $codeQuartier, $quartier, $commentaire, $date)
    {
        $this->_codeCommentaire = $codeCommentaire;
        $this->_codePays = $codePays;
        $this->_pays = $pays;
        $this->_codeQuartier = $codeQuartier;
        $this->_quartier = $quartier;
        $this->_commentaire = $commentaire;
        $this->_date = $date;
    }


}
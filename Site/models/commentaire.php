<?php

class commentaire
{

    private $_codeCommentaire;
    private $_codePays;
    private $_pays;
    private $_codeQuartier;
    private $_quartier;
    private $_nom;
    private $_commentaire;
    private $_date;


    public function __construct($codeCommentaire, $codePays, $pays, $codeQuartier, $quartier, $nom, $commentaire, $date)
    {
        $this->_codeCommentaire = $codeCommentaire;
        $this->_codePays = $codePays;
        $this->_pays = $pays;
        $this->_codeQuartier = $codeQuartier;
        $this->_quartier = $quartier;
        $this->_nom = $nom;
        $this->_commentaire = $commentaire;
        $this->_date = $date;
    }

    /**
     * @return mixed
     */
    public function getCodeCommentaire()
    {
        return $this->_codeCommentaire;
    }

    /**
     * @return mixed
     */
    public function getCodePays()
    {
        return $this->_codePays;
    }

    /**
     * @return mixed
     */
    public function getPays()
    {
        return $this->_pays;
    }

    /**
     * @return mixed
     */
    public function getCodeQuartier()
    {
        return $this->_codeQuartier;
    }

    /**
     * @return mixed
     */
    public function getQuartier()
    {
        return $this->_quartier;
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
    public function getCommentaire()
    {
        return $this->_commentaire;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->_date;
    }

    public function toArray(){
        return array(
            $this->_codeCommentaire,
            $this->_codePays,
            $this->_pays,
            $this->_codeQuartier,
            $this->_quartier,
            $this->_nom,
            $this->_commentaire,
            $this->_date
        );
    }

}
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


    /**
     * commentaire constructor.
     * @param $codeCommentaire
     * @param $codePays
     * @param $pays
     * @param $codeQuartier
     * @param $quartier
     * @param $nom
     * @param $commentaire
     * @param $date
     */
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

    /**
     * @return array
     */
    public function toArray(){
        return array(
            'id' => $this->_codeCommentaire,
            'codePays' => $this->_codePays,
            'libellePays' => $this->_pays,
            'codeQuartier' => $this->_codeQuartier,
            'quartier' => $this->_quartier,
            'nom' => $this->_nom,
            'commentaire' => $this->_commentaire,
            'date' => $this->_date
        );
    }

}
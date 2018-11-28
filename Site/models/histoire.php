<?php

class histoire
{

    private $_codeMonument;
    private $_codePays;
    private $_codeQuartier;
    private $_quartier;
    private $_titre;
    private $_image;
    private $_commentaire;

    /**
     * histoire constructor.
     * @param $codeMonument
     * @param $codePays
     * @param $codeQuartier
     * @param $quartier
     * @param $titre
     * @param $image
     * @param $commentaire
     */
    public function __construct($codeMonument, $codePays, $codeQuartier, $quartier, $titre, $image, $commentaire)
    {
        $this->_codeMonument = $codeMonument;
        $this->_codePays = $codePays;
        $this->_codeQuartier = $codeQuartier;
        $this->_quartier = $quartier;
        $this->_titre = $titre;
        $this->_image = $image;
        $this->_commentaire = $commentaire;
    }

    /**
     * @return mixed
     */
    public function getCodeMonument()
    {
        return $this->_codeMonument;
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
    public function getTitre()
    {
        return $this->_titre;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->_image;
    }

    /**
     * @return mixed
     */
    public function getCommentaire()
    {
        return $this->_commentaire;
    }

    /**
     * @return array
     */
    public function toArray(){

        return array('codeMonument' => $this->_codeMonument,
            'codePays' => $this->_codePays,
            'codeQuartier' => $this->_codeQuartier,
            'quartier' => $this->_quartier,
            'titre'=> $this->_quartier,
            'image' => $this->_image,
            'commentaire' => $this->_commentaire,
        );

    }

}
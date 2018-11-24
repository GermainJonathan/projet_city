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
     * @param $_codeMonument
     * @param $_codePays
     * @param $_codeQuartier
     * @param $_quartier
     * @param $_titre
     * @param $_image
     * @param $_commentaire
     */
    public function __construct($_codeMonument, $_codePays, $_codeQuartier, $_quartier, $_titre, $_image, $_commentaire)
    {
        $this->_codeMonument = $_codeMonument;
        $this->_codePays = $_codePays;
        $this->_codeQuartier = $_codeQuartier;
        $this->_quartier = $_quartier;
        $this->_titre = $_titre;
        $this->_image = $_image;
        $this->_commentaire = $_commentaire;
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
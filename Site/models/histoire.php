<?php

class histoire
{

    private $_codeHistoire;
    private $_codePays;
    private $_codeQuartier;
    private $_quartier;
    private $_titre;
    private $_image;
    private $_commentaire;

    /**
     * histoire constructor.
     * @param $codeHistoire
     * @param $codePays
     * @param $codeQuartier
     * @param $quartier
     * @param $titre
     * @param $image
     * @param $commentaire
     */
    public function __construct($codeHistoire, $codePays, $codeQuartier, $quartier, $titre, $image, $commentaire)
    {
        $this->_codeHistoire = $codeHistoire;
        $this->_codePays = $codePays;
        $this->_codeQuartier = $codeQuartier;
        $this->_quartier = $quartier;
        $this->_titre = $titre;
        if($image == null || !file_exists(PATH_IMAGES.strtolower($quartier)."/".$image))
            $this->_image = "undefined.png";
        else
            $this->_image = $image;
        $this->_commentaire = $commentaire;
    }

    /**
     * @return mixed
     */
    public function getcodeHistoire()
    {
        return $this->_codeHistoire;
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

        return array('id' => $this->_codeHistoire,
            'codePays' => $this->_codePays,
            'codeQuartier' => $this->_codeQuartier,
            'quartier' => $this->_quartier,
            'titre'=> $this->_titre,
            'image' => $this->_image,
            'commentaire' => $this->_commentaire,
        );

    }

}
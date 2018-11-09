<?php


class activite
{

    private $_codeActivite;
    private $_codePays;
    private $_codeQuartier;
    private $_quartier;
    private $_codeCategorie;
    private $_titre;
    private $_nomLieux;
    private $_image;
    private $_commentaire;

    public function __construct($codeActivite, $codePays, $codeQuartier, $quartier, $codeCategorie, $titre, $nomLieux, $image, $commentaire)
    {
        $this->_codeActivite = $codeActivite;
        $this->_codePays = $codePays;
        $this->_codeQuartier = $codeQuartier;
        $this->_quartier = $quartier;
        $this->_codeCategorie = $codeCategorie;
        $this->_titre = $titre;
        $this->_nomLieux = $nomLieux;
        $this->_image = PATH_IMAGES.$image;
        $this->_commentaire = $commentaire;
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
    public function getCodeActivite()
    {
        return $this->_codeActivite;
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
    public function getCodeCategorie()
    {
        return $this->_codeCategorie;
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
    public function getNomLieux()
    {
        return $this->_nomLieux;
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
        return array(
        'codeActivite' => $this->_codeActivite,
        'codePays' => $this->_codePays,
        'codeQuartier' => $this->_codeQuartier,
        'quartier' => $this->_quartier,
        'codeCategorie' => $this->_codeCategorie,
        'titre' => $this->_titre,
        'nomLieux' => $this->_nomLieux,
        'image' => $this->_image,
        'commentaire' => $this->_commentaire
        );
    }

}
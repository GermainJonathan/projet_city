<?php

class restaurant
{

    private $_codeRestaurant;
    private $_codePays;
    private $_codeQuartier;
    private $_quartier;
    private $_nom;
    private $_adresse;
    private $_numero;
    private $_image;
    private $_commentaire;

    /**
     * restaurant constructor.
     * @param $codeRestaurant
     * @param $codePays
     * @param $codeQuartier
     * @param $quartier
     * @param $nom
     * @param $adresse
     * @param $numero
     * @param $image
     * @param $commentaire
     */
    public function __construct($codeRestaurant, $codePays, $codeQuartier, $quartier, $nom, $adresse, $numero, $image, $commentaire)
    {
        $this->_codeRestaurant = $codeRestaurant;
        $this->_codePays = $codePays;
        $this->_codeQuartier = $codeQuartier;
        $this->_quartier = $quartier;
        $this->_nom = $nom;
        $this->_adresse = $adresse;
        $this->_numero = $numero;
        $this->_image = $image;
        $this->_commentaire = $commentaire;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->_adresse;
    }

    /**
     * @return mixed
     */
    public function getCodeRestaurant()
    {
        return $this->_codeRestaurant;
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
    public function getNom()
    {
        return $this->_nom;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->_numero;
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
        return array(
            'codeRestaurant' => $this->_codeRestaurant,
            'codePays' => $this->_codePays,
            'codeQuartier' => $this->_codeQuartier,
            'quartier' => $this->_quartier,
            'nom' => $this->_nom,
            'numero' => $this->_numero,
            'image' => $this->_image,
            'adresse' => $this->_adresse,
            'commentaire' => $this->_commentaire
        );
    }

}
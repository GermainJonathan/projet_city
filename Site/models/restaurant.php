<?php

class restaurant
{

    private $_codeRestaurant;
    private $_codePays;
    private $_codeQuartier;
    private $_quartier;
    private $_nom;
    private $_numero;
    private $_image;
    private $_adresse;
    private $_commentaire;

    /**
     * restaurant constructor.
     * @param $_codeRestaurant
     * @param $_codePays
     * @param $_codeQuartier
     * @param $_quartier
     * @param $_nom
     * @param $_numero
     * @param $_image
     * @param $_adresse
     * @param $_commentaire
     */
    public function __construct($_codeRestaurant, $_codePays, $_codeQuartier, $_quartier, $_nom, $_numero, $_image, $_adresse, $_commentaire)
    {
        $this->_codeRestaurant = $_codeRestaurant;
        $this->_codePays = $_codePays;
        $this->_codeQuartier = $_codeQuartier;
        $this->_quartier = $_quartier;
        $this->_nom = $_nom;
        $this->_numero = $_numero;
        $this->_image = $_image;
        $this->_adresse = $_adresse;
        $this->_commentaire = $_commentaire;
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
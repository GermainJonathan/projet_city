<?php


class activite
{

    private $_codeActivite;
    private $_codePays;
    private $_codeCategorie;
    private $_titre;
    private $_nomLieux;
    private $_image;
    private $_commentaire;

    /**
     * activite constructor.
     * @param $_codeActivite
     * @param $_codePays
     * @param $_codeCategorie
     * @param $_titre
     * @param $_nomLieux
     * @param $_image
     * @param $_commentaire
     */
    public function __construct($codeActivite, $codePays, $codeCategorie, $titre, $nomLieux, $image, $commentaire)
    {
        $this->_codeActivite = $codeActivite;
        $this->_codePays = $codePays;
        $this->_codeCategorie = $codeCategorie;
        $this->_titre = $titre;
        $this->_nomLieux = $nomLieux;
        $this->_image = PATH_IMAGES.$image;
        $this->_commentaire = $commentaire;
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

}
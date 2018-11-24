<?php

class monument
{
    private $_codeMonument;
    private $_codePays;
    private $_codeQuartier;
    private $_quartier;
    private $_libelleMonument;
    private $_dateConstruction;
    private $_architecte;
    private $_image;
    private $_commentaire;

    /**
     * monument constructor.
     * @param $codeMonument
     * @param $codePays
     * @param $codeQuartier
     * @param $quartier
     * @param $libelleMonument
     * @param $dateConstruction
     * @param $architect
     * @param $image
     * @param $commentaire
     */
    public function __construct($codeMonument, $codePays, $codeQuartier, $quartier, $libelleMonument, $dateConstruction, $architect, $image, $commentaire)
    {
        $this->_codeMonument = $codeMonument;
        $this->_codePays = $codePays;
        $this->_codeQuartier = $codeQuartier;
        $this->_quartier = $quartier;
        $this->_libelleMonument = $libelleMonument;
        $this->_dateConstruction = $dateConstruction;
        $this->_architecte = $architect;
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
    public function getLibelleMonument()
    {
        return $this->_libelleMonument;
    }

    /**
     * @return mixed
     */
    public function getDateConstruction()
    {
        return $this->_dateConstruction;
    }

    /**
     * @return mixed
     */
    public function getArchitecte()
    {
        return $this->_architecte;
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
            'libelleMonument' => $this->_libelleMonument,
            'dateConstruction' => $this->_dateConstruction,
            'architecte' => $this->_architecte,
            'image' => $this->_image,
            'commentaire' => $this->_commentaire,
            );
    }
}
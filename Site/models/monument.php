<?php
/**
 * Model Monument
 */
class Monument {

    // Id du monument
    private $id;

    // Id pays
    private $idPays;

    // Id quartier
    private $idQuartier;

    // Nom du monument
    private $nomMonument = "";

    // date de construction du monument
    private $dateConstruction;

    // Nom de l'architecte
    private $architecte;

    // Path vers la/les image(s)
    private $pathImage = array();

    // cooordonees du monument
    private $coordonees;

    /**
     * Constructeur du model
     * 
     * @var integer id
     * @var integer idPays
     * @var integer idQuartier
     * @var string nomMonument
     * @var Date dateConstruction
     * @var string architecte
     * @var string coordonees
     */
    public function __construct($id, $idPays, $idQuartier, $nomMonument, $dateConstruction, $architecte, $coordonees) {
        $this->$id = $id;
        $this->$idPays = $idPays;
        $this->$idQuartier = $idQuartier;
        $this->$nomMonument = $nomMonument;
        $this->$dateConstruction = $dateConstruction;
        $this->$architecte = $architecte;
        $this->$coordonees = $coordonees;
    }

}
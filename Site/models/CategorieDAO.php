<?php
require_once("DAO.php"); //L'utilité du modele c'est de pas avoir les requetes etc ailleurs

class CategorieDAO extends DAO
{
    //déclaration des méthodes
	
	//retourne un tableau des catégories (CatID, nomCat) 
    public function getCategories() {
        $noms_Categories = $this->queryAll('SELECT CatID, nomCat FROM categorie');
		
		return $noms_Categories;
    }
}
?>
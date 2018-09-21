<?php
require_once("DAO.php"); //L'utilité du modele c'est de pas avoir les requetes etc ailleurs

class PhotoDAO extends DAO
{
    // déclaration des méthodes
	
	//retourne les IDs des photos de la catégorie passée en paramètres
    public function getPhotosIds($cate) {
		
		if($cate == 0)
			$res = $this->queryAll('SELECT * FROM photo');
		else
			$res = $this->queryAll('SELECT * FROM photo WHERE CatID = ?', array($cate));
		return $res;
    }
	
	//supprime la photo dont l'id est passé en paramètre. retourne une éventuelle erreur.
	public function supprimerPhoto($idPhoto) {
		
		if((int)$idPhoto>0 and (int)$idPhoto<($this->getMaxPhotoID())){
			return $this -> querybdd('delete from photo where photoID =?', array($idPhoto));
		}else{
			return;
		}
    }
	
	
	//retourne la photo dont l'ID est passé en paramètre
	public function getPhotoByID($IDphoto)
	{
		return $this->queryRow('SELECT * FROM photo WHERE photoID = ?', array($IDphoto));
	}
	
	
	//retourne la catégorie dont l'ID est passé en paramètre
	public function getCatByPhoto($catID)
	{ 
		return $this->queryRow('SELECT nomCat FROM categorie WHERE catID = ?', array($catID));
	}
	
	
	//retourne la valeur max des IDs de photos 
	public function getMaxPhotoID()
	{
		return $this->queryRow('SELECT MAX(photoID) as max FROM photo');
	}
	
	public function ajoutPhoto($photoID, $photoName, $photoDescrip, $catID, $idUser)
	{
		return $this -> querybdd('INSERT INTO photo VALUES(?, ?, ?, ?, ?)', array($photoID, $photoName, $photoDescrip, $catID, $idUser));
	}
}
?>
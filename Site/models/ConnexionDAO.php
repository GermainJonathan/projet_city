<?php

require_once("DAO.php");

class ConnexionDAO extends DAO
{
	
	//appel à la fonction queryRow pour vérifier l'identification de la combinaison mail/mdp
	public function checkIndentification($mail, $pwd)
	{
		
		$res = $this->queryRow('SELECT userID FROM user WHERE  mail = ? AND motdepasse = ?', Array($mail, sha1($pwd)));
		
		if(!empty($res['userID']))
			return $res['userID'];
		else
			return -1;
    }
	
	//appel à la fonction queryRow pour vérifier l'existance d'un email en bdd
	public function checkMailExistant($mail)
	{
			$res = $this -> queryRow('SELECT userID FROM user WHERE mail = ?', Array($mail));
			
		if(!empty($res['userID']))
			return false;
		else
			return true;
	}
	
	//appel à la fonction querybdd pour ajouter un utilisateur à la bdd
	public function newInscription($nom, $prenom, $mail, $pwd)
	{
		$userID = $this -> queryRow('SELECT MAX(userID) as ID FROM user');
		$userID = $userID['ID'] + 1;
		
		$this -> querybdd('INSERT INTO user VALUES(?, ?, ?, ?, ?, ?)', Array($userID, $prenom, $nom, $mail, sha1($pwd), 0));
		
		return $userID;
		
	}
	
	//appel à la fonction queryRow pour retourner toutes les informations sur l'utilisateur dont l'ID est passé en paramètre
	public function getInformationsConnexion($idUser)
	{
		return $this -> queryRow('SELECT * FROM user WHERE userID = ?', array($idUser));
	}

	//appel à la fonction querybdd pour augmenter le nombre d'uploads d'un utilisateur dans la bdd
	public function incremntNbPhoto($idUser)
	{
		return $this -> querybdd('UPDATE user set nbphotoupload = nbphotoupload + 1 WHERE userID = ?', array($idUser));
	}
	
	//appel à la fonction queryRow pour vérifier le mot de passe.
	public function verifpwd($idUser, $pwd)
	{
		$res = $this -> queryRow('SELECT 1 FROM user WHERE userID = ? AND motdepasse = ?', array($idUser, sha1($pwd)));
		if(!empty($res) && $res != null)
			return true;
		else
			return false;
	}
	
	//appel à la fonction querybdd pour changer le mot de passe.
	public function changepwd($idUser, $pwd)
	{
		$this -> querybdd('UPDATE user set motdepasse = ? WHERE userID = ?', array(sha1($pwd), $idUser));
	}
}
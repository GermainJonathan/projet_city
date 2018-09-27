<?php

// Implémente le pattern Singleton
class Connexion 
{
  private $_bdd = null;
  private static $_instance = null;

  //appelée par new
  private function __construct ()
  {
    $this->_bdd = new PDO('mysql:host='.BD_HOST.'; dbname='.BD_DBNAME.'; charset=utf8', BD_USER, BD_PWD);
    $this->_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  
  //retourne l'instance 
  public static function getInstance()
  {
    if(is_null(self::$_instance))
      self::$_instance = new Connexion();
    return self::$_instance;
  }
  
  //retourne la bdd
  public function getBdd()
  {
    return $this->_bdd;
  }

}

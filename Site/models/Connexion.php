<?php

// Implémente le pattern Singleton
class Connexion 
{
  private $_bdd = null;
  private static $_instance = null;

    /**
     * Connexion constructor.
     */
    private function __construct ()
  {
    $this->_bdd = new PDO('mysql:host='.BD_HOST.'; dbname='.BD_DBNAME.'; charset=utf8', BD_USER, BD_PWD);
    $this->_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

    /**
     * @return Connexion|null
     */
    public static function getInstance()
  {
    if(is_null(self::$_instance))
      self::$_instance = new Connexion();
    return self::$_instance;
  }

    /**
     * @return null|PDO
     */
    public function getBdd()
  {
    return $this->_bdd;
  }

}

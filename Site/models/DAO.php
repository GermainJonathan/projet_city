<?php
require_once('Connexion.php');
abstract class DAO
{
    private $_erreur; //stocke les messages d'erreurs associées au PDOException
    private $_debug;

    /**
     * DAO constructor.
     * @param $debug
     */
    public function __construct($debug)
    {
        $this->_debug = $debug;
        $this->_erreur = null;
    }

    /**
     * @return null
     */
    public function getErreur()
    {
        return $this->_erreur;
    }

    /**
     *
     */
    protected function beginTransaction()
    {
        Connexion::getInstance()->getBdd()->beginTransaction();
    }

    /**
     *
     */
    protected function endTransaction()
    {
        if (is_null($this->_erreur)) {
            Connexion::getInstance()->getBdd()->commit();
        }
    }

    /**
     * @param $sql
     * @param null $args
     * @return PDOStatement
     */
    private function _requete($sql, $args = null)
    {
        if ($args == null) {
            $pdos = Connexion::getInstance()->getBdd()->query($sql);// exécution directe
        } else {
            $pdos = Connexion::getInstance()->getBdd()->prepare($sql);// requête préparée
            if(!$pdos->execute($args)) {
                $this->_erreur = $pdos->errorInfo();
            }
        }
        return $pdos;
    }


    // retourne l'identifiant de la ligne insérée
    // ou false
    /**
     * @return bool|string
     */
    protected function insertId()
    {
        try {
            $res = Connexion::getInstance()->getBdd()->lastInsertId();
        } catch (PDOException $e) {
            if ($this->_debug) {
                die($e->getMessage());
            }
            $this->_erreur = 'query';
            $res = false;
        }
        return $res;
    }

    /**
     * @param $sql
     * @param null $args
     * @return bool|mixed
     */
    protected function queryRow($sql, $args = null)
    {
        try {
            $pdos = $this->_requete($sql, $args);
            $res = $pdos->fetch();
            $pdos->closeCursor();
        } catch (PDOException $e) {
            if ($this->_debug) {
                die($e->getMessage());
            }
            $this->_erreur = 'query';
            $res = false;
        }
        return $res;
    }

    /**
     * @param $sql
     * @param null $args
     * @return bool
     */
    protected function queryBdd($sql, $args = null)
    {
        $res = true;
        try {
            $pdos = $this->_requete($sql, $args);
            $pdos->closeCursor();
        } catch (PDOException $e) {
            if ($this->_debug) {
                die($e->getMessage());
            }
            $this->_erreur = 'query';
            $res = false;
        }
        return $res;
    }

    /**
     * @param $sql
     * @param null $args
     * @return array|bool
     */
    protected function queryAll($sql, $args = null)
    {
        try {
            $pdos = $this->_requete($sql, $args);
            $res = $pdos->fetchAll(PDO::FETCH_ASSOC);
            $pdos->closeCursor();
        } catch (PDOException $e) {
            error_log('$e : '.print_r($e->getMessage(),true));
            if ($this->_debug) {
                die($e->getMessage());
            }
            $this->_erreur = 'query';
            $res = false;
        }
        return $res;
    }
}

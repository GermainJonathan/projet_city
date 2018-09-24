<?php

require_once PATH_MODELS.'DAO.php';

class testDAO extends DAO
{

    public function testBDD(){

        return $this->queryAll("SELECT * FROM pays");

    }

}
<?php

require_once PATH_MODELS."DAO.php";

class forumDAO extends DAO
{

    public function getTopic(){

        return $this->queryAll("SELECT * FROM topic");

    }

}
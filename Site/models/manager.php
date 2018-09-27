<?php

require_once PATH_MODELS.'paysDAO.php';
require_once PATH_MODELS.'forumDAO.php';

class manager
{

    public function getPays($id = null)
    {
        $paysDAO = new paysDAO(DEBUG);
        return $paysDAO->getPays();
    }

    public function getTopic(){
        $forumDAO = new forumDAO(DEBUG);
        return $forumDAO->getTopic();
    }

}
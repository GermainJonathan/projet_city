<?php

require_once PATH_MODELS.'paysDAO.php';

class manager
{

    private $_paysDAO;

    public function getPays($id = null)
    {

        $paysDAO = new paysDAO(DEBUG);
        return $paysDAO->getPays();

    }

}
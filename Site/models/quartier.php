<?php


class quartier
{

    private $_codeQuartier;
    private $_libelleQuartier;

    /**
     * quartier constructor.
     * @param $codeQuartier
     * @param $libelleQuartier
     */
    public function __construct($codeQuartier, $libelleQuartier)
    {
        $this->_codeQuartier = $codeQuartier;
        $this->_libelleQuartier = $libelleQuartier;
    }

    /**
     * @return mixed
     */
    public function getCodeQuartier()
    {
        return $this->_codeQuartier;
    }

    /**
     * @return mixed
     */
    public function getLibelleQuartier()
    {
        return $this->_libelleQuartier;
    }


}
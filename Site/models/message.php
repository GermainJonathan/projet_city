<?php


class message
{

    private $_idMessage;
    private $_idTopic;
    private $_message;
    private $_date;


    public function __construct($idMessage, $idTopic, $message, $date)
    {
        $this->_idMessage = $idMessage;
        $this->_idTopic = $idTopic;
        $this->_message = $message;
        $this->_date = $date;
    }

    public function getIdMessage()
    {
        return $this->_idMessage;
    }

    public function getIdTopic()
    {
        return $this->_idTopic;
    }

    public function getMessage()
    {
        return $this->_message;
    }

    public function getDate()
    {
        return $this->_date;
    }


}
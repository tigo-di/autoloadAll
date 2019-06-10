<?php

class Core
{

    private $message = 'This is a message from class Core: 
    set constant PRINTLOGS = false in configs.php to turn off print classpath';


    public function getMessage()
    {

        return $this->message;
        throw new Exception('>> errror');

    } 
 
}
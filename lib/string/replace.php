<?php

class Replace
{


    private $string;
    private $search;
    private $change;
    private $result;
        

    public function setString($input)
    {

        $this->string = $input;

    }


    public function change($search, $change)
    {

        $this->result = str_ireplace($search, $change, $this->string);

    }


    public function getResult()
    {

        return $this->result;

    }


}
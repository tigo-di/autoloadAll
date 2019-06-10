<?php


class Divide
{

    private $result;

    public function __construct($numerator, $denominator)
    {

        $this->result = floor($numerator/$denominator);

    }

    public function getResult()
    {
        return $this->result;

    }

}

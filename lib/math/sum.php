<?php

class Summm
{

    private $result = 0;
    private $termsArray = [];
    private $termsArrayLiteral;

    
    public function setTerm($termInput)
    {

        if (is_numeric($termInput)) { 
            
            array_push($this->termsArray, $termInput);
        
        }

    }


    public function result()
    {

        foreach ($this->termsArray as $term) {
            
            $this->result = $this->result + $term;

            $this->termsArrayLiteral .= $term . ' + ';


        }


        $this->termsArrayLiteral = preg_replace('/\s\+\s$/','', $this->termsArrayLiteral);

        return $this->termsArrayLiteral . ' = ' . $this->result;

    }


}
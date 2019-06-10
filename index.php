<?php

header('Content-Type: text/html; charset=utf-8');

require_once('lib/functions.php');

require_once('app/configs.php');
$configs = new configs('configs.ini');


// autoload always after functions and configs
require_once('autoload.php');


// Calling class Core
// baseclasspath "app" exists in configs.ini
// file exists
// class exists
// correct return
try {

    $core = new Core();
    output('>> ' . $core->getMessage());
    
} catch (Throwable $t) {
    output($t->getMessage());
}


// Calling class Sum
// baseclasspath "sum" exists in configs.ini
// file exists
// wrong class name in file: Summm
// return Class Sum not founded
try {

    $sum = new Sum();
    
    $sum->setTerm(9);
    $sum->setTerm(2);
    $sum->setTerm(3);

    $result = $sum->result();

    output('>> Sum: ' . $result);
    
} catch (Throwable $t) {
    output($t->getMessage());
}



// Calling class Divide
// baseclasspath "." not exists in configs.ini
// file exists
// class exists
// return Class Divide not found
try {
    
    $replace = new Divide(20,5);
    output('>> Divide: ' . $replace->getResult());
    
} catch (Throwable $t) {
    output($t->getMessage());
}



// Calling class Replace
// baseclasspath "lib" exists in configs.ini
// file exists
// class exists
// correct return
try {
    
    $replace = new Replace();
    $replace->setString('Joan is new here');
    $replace->change('Joan','Clarice');
   
    $result = $replace->getResult();

    output('>> Replace: ' . $result);
    
} catch (Throwable $t) {
    output($t->getMessage());
}

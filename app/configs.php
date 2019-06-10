<?php

class configs
{

    private $cfgs;
    private $server = 'local';

    public function __construct($pathConfig)
    {
    
        $this->cfgs = parse_ini_file( __DIR__ . '/../' . $pathConfig, TRUE);
        
        if ($_SERVER['HTTP_HOST'] == $this->cfgs['remote']['domain']) {
            $this->server = 'remote';
        }

        define('BASE_CLASSPATH_ARRAY', $this->cfgs['baseclasspath']);
        
        define('PRINTLOGS', $this->cfgs['general']['printlogs']);

    }

}
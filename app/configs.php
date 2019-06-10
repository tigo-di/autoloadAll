<?php

class configs
{

    private $cfgs;
    private $server = 'local';
    private $classPathArray = [];
    private $messageOutput;


    public function __construct($pathConfig)
    {
    
        $this->cfgs = parse_ini_file( __DIR__ . '/../' . $pathConfig, TRUE);
        
        if ($_SERVER['HTTP_HOST'] == $this->cfgs['remote']['domain']) {
            $this->server = 'remote';
        }

        define('PRINTLOGS', $this->cfgs['general']['printlogs']);

        define('CLASSPATH_ARRAY', $this->classpath($this->cfgs['baseclasspath']));

    }


    private function classpath($baseclassPathArray)
    {

        foreach ($baseclassPathArray as $currrentClassPath) {


            if (!is_dir($currrentClassPath)) {
                $messageOutput = 'Baseclasspath ' . $currrentClassPath .' not found';
            }
            else
            {
                $this->classPathArray = array_merge($this->classPathArray, directories($currrentClassPath));
                $messageOutput = $currrentClassPath;
            }


            if (PRINTLOGS) {
                output($messageOutput);
            }


        }

        return $this->classPathArray;

    }


}

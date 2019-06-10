<?php

function autoloadAll ($nameClass)
{

    $countBASE_CLASSPATH_ARRAY = count(BASE_CLASSPATH_ARRAY);
    $iteratorBASE_CLASSPATH_ARRAY = 0;

    
    foreach (BASE_CLASSPATH_ARRAY as $classPath) {

        if (!is_dir($classPath)) {

            output('Baseclasspath ' . $classPath .' not found');
        
        }
        else
        {

            $directoriesArray = directories($classPath);
        
            
                 // directories create Array with the folder of variable $classPath and yours subfolders 
                foreach ($directoriesArray as $directoryCurrent) {

                    $extension = '.php';
                    $fullPath =  $directoryCurrent . strtolower($nameClass) . $extension;

                    $printlogExtra = false;

                    
                    if (file_exists($fullPath)) {
                        require_once($fullPath);
                        $printlogExtra = true;
                    }


                    if (PRINTLOGS) {

                        $printlogExtraText = ($printlogExtra ? ' <b>file founded</b>' : '' );

                        echo output($fullPath . $printlogExtraText);
                        
                        $printlogExtra = false;

                    }


                }

       
        }

        // In the end of two loops, it is to verified if the class was loaded. 
        // If false, It is thrown an error
        $iteratorBASE_CLASSPATH_ARRAY = $iteratorBASE_CLASSPATH_ARRAY + 1;
        
            if ($countBASE_CLASSPATH_ARRAY == $iteratorBASE_CLASSPATH_ARRAY &&
            !class_exists($nameClass, false)) {
                
                throw new Exception('>> Class ' . $nameClass . ' not found');
            
            }

    }

}

spl_autoload_register('autoloadAll');
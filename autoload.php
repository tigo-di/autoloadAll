<?php

function autoloadAll ($nameClass)
{

    $countCLASSPATH_ARRAY = count(CLASSPATH_ARRAY);
    $iteratorCLASSPATH_ARRAY = 0;

               
        // directories create Array with the folder of variable $classPath and yours subfolders 
        foreach (CLASSPATH_ARRAY as $directoryCurrent) {

            $extension = '.php';
            $fullPath =  $directoryCurrent . strtolower($nameClass) . $extension;

            $printlogExtra = false;


                if (file_exists($fullPath)) {
                    require_once($fullPath);
                    $printlogExtra = true;
                }


                if (PRINTLOGS) {

                    $printlogExtraText = ($printlogExtra ? ' <b>file founded</b>' : '' );

                    output($fullPath . $printlogExtraText);
                    
                    $printlogExtra = false;

                }


            // In the end of two loops, it is to verified if the class was loaded. 
            // If false, It is thrown an error
            $iteratorCLASSPATH_ARRAY = $iteratorCLASSPATH_ARRAY + 1;
            
                if ($countCLASSPATH_ARRAY == $iteratorCLASSPATH_ARRAY &&
                !class_exists($nameClass, false)) {
                    
                    throw new Exception('>> Class ' . $nameClass . ' not found');
                
                }


        }


}

spl_autoload_register('autoloadAll');
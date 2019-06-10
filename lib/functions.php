<?php 


// return Array with the directory $classPath and yours subdirectories

function directories($classPath)
{

    $directoryIterator  = new RecursiveDirectoryIterator($classPath);
    $it = new RecursiveIteratorIterator($directoryIterator);

    $paths = [];

    foreach ($it as $directory) {

        if (is_dir($directory)) {

            // remove ./ at beginning
            // remove /. and /.. at end
            // SKIP_DOTS dont work
            $directoryCurrent = preg_replace('/^\.\/|\/\.+/', '', $directory);

            $paths[] = $directoryCurrent . DIRECTORY_SEPARATOR;

        }

    }

    // Above, turns "folderA/." and "folderA/.." into "folderA" and "folderA".
    // Use array_unique function to remove duplicate item array.  
    return array_unique($paths);

}

function output($content)
{
    echo '<p>' . $content . '</p>' . "\n";
}

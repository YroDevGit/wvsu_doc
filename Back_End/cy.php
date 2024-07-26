<?php

/**
 * @author Tyrone Limen Malocon
 * CY command to start server inside Front_End environment
 *  CodeYro
 */
include_once "..\IgniteData\ForCommand\command.php";
/**
 * Please do not modify anything here...
 * 
 */

function findProjectRoot($currentDir) {
    $maxDepth = 10;
    $depth = 0;

    while ($depth < $maxDepth) {
        if (is_dir($currentDir . DIRECTORY_SEPARATOR . 'Back_End')) {
            return $currentDir;
        }

        $currentDir = dirname($currentDir);
        $depth++;
    }

    return false;
}

$currentDir = getcwd();

$projectRoot = findProjectRoot($currentDir);

if ($projectRoot === false) {
    echo "Error: Project root directory not found.\n";
    exit(1);
}

chdir($projectRoot);

$command = $php_command;
echo $print_data;

passthru($command);
/**
 * CodeYro by: Tyrone Limen Malocon => Yro Lee Emz
 */

?>

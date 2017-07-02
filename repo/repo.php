<?php

// Cd to root directory (note we are a folder down from it)
// exec('cd '.dirname(__FILE__)."/../");

// Add databases
$output = shell_exec('cd '.dirname(__FILE__).'/../ && git add *.sqlite3');
echo "==================================\n";
echo $output."\n";
echo "==================================\n";

// Commit
$output = shell_exec('cd '.dirname(__FILE__).' && git commit --author="db_bot <db_bot@example.com>" -m "Datbase Update - '.date("Y-m-d h:i:sa").'" ');
echo "==================================\n";
echo $output."\n";
echo "==================================\n";

// Push it!
$output = shell_exec('cd '.dirname(__FILE__).' && git push origin master');
echo "==================================\n";
echo $output."\n";
echo "==================================\n";


?>
#!/usr/bin/php
<?php

if ($argc != 4)
{
    echo "Incorrect Parameters\n";
    exit;
}

$var1 = trim($argv[1]);
$var1 = preg_replace('/\s+/', '', $var1);
$op = trim($argv[2]);
$var2 = trim($argv[3]);
$var2 = preg_replace('/\s+/', '', $var2);

switch ($op)
{
    case "+" :
        echo $var1 + $var2.PHP_EOL;
        break;
    case "-" :
        echo $var1 - $var2.PHP_EOL;
        break;
    case "/" :
        if ($var2 == 0)
            exit;
        echo $var1 / $var2.PHP_EOL;
        break;
    case "*" :
        echo $var1 * $var2.PHP_EOL;
        break;
    case "%" :
        echo $var1 % $var2.PHP_EOL;
        break;
}
?>
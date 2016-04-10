#!/usr/bin/php
<?php

if ($argc != 2)
{
    echo "Incorrect Parameters\n";
    exit;
}

$str = $argv[1];

$pos = strpos($str, "+");
if (!$pos)
    $pos = strpos($str, "-");
if (!$pos)
    $pos = strpos($str, "*");
if (!$pos)
    $pos = strpos($str, "/");
if (!$pos)
    $pos = strpos($str, "%");

function eror()
{
    echo "Syntax Error\n";
    exit;
}

if (!$pos)
    eror();

$arr = explode($str[$pos], $str);

$var1 = trim($arr[0]);
$var1 = preg_replace('/\s+/', '', $var1);
$op = trim($str[$pos]);
$var2 = trim($arr[1]);
$var2 = preg_replace('/\s+/', '', $var2);

if (!is_numeric($var1) || (!is_numeric($var2)))
    eror();

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

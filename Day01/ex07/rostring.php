#!/usr/bin/php
<?php

$str1 = $argv[1];

$str1 = preg_replace('/\s+/',' ', $str1);

$str1 = explode(" ", $str1);

$word = $str1[0];

$str1 = array_slice($str1, 1);

foreach ($str1 as $item)
    echo $item." ";
echo $word;
?>

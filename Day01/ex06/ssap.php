#!/usr/bin/php
<?php

foreach (array_slice($argv, 1) as $item)
    $sir = $sir . $item . " ";
$sir = preg_split('/\s+/', $sir);

sort($sir);

foreach (array_slice($sir, 1) as $item)
    echo $item . PHP_EOL;
?>
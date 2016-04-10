#!/usr/bin/php
<?php

if ($argc > 1) {
    $first = trim($argv[1]);
    $first = preg_replace('/\s+/', ' ', $first);

    echo $first;
    echo PHP_EOL;
}

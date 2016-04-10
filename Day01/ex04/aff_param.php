#!/usr/bin/php
<?php
if ($argc > 1) {
    $slice = array_slice($argv, 1);

    foreach ($slice as $item) {
        echo "$item" . PHP_EOL;
    }
}
?>
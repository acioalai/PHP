#!/usr/bin/php
<?php

$stdin = fopen('php://stdin', 'r');

while ($stdin && !feof($stdin)) {
    echo "Entrez un nombre: ";
    $from_input = fgets($stdin);
    $trimmed= trim($from_input);
    if (is_numeric($trimmed)) {
        if (($trimmed % 2) == 0)
            echo "Le chiffre $trimmed est Pair" . PHP_EOL;
        else
            echo "Le chiffre $trimmed est Impair" . PHP_EOL;
    }else if (is_string($from_input))
        echo "'$trimmed' n'est pas un chiffre" . PHP_EOL;

    else if ($from_input == null) {
        echo PHP_EOL;
        break;
    }
}
fclose($stdin);
?>
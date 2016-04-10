#!/usr/bin/php
<?PHP

$sir = trim($argv[1]);
$sir = preg_replace('/\s+/',' ', $sir);

if($argc > 1)
    echo "$sir".PHP_EOL;
?>
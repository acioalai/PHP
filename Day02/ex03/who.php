#!/usr/bin/php
<?php

date_default_timezone_set('Europe/Paris');
if (!file_exists("/var/run/utmpx"))
    exit;
$fd = fopen("/var/run/utmpx", "r");
$str = fread($fd, 1256);

function print_my($user, $line, $time1)
{
    $time = strftime("%b %e %H:%M ",$time1);
    echo $user."  ".$line."  ".$time.PHP_EOL;
}

while (!feof($fd))
{
    $tab = unpack("a256user/a4id/a32line/ipid/itype/i2time/a256host/@", $str);
    $tab = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $tab);
    if (trim($tab[user]) == get_current_user())
        print_my($tab[user], $tab[line], $tab[time1]);
    $str = fread($fd, 628);
}
?>
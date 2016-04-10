#!/usr/bin/php
<?php

if ($argc > 1)
    $first = $argv[1];
else
    exit;

if (substr_count($first, " ") != 4)
    wrong();
$first = explode(" ", $first);

function wrong()
{
    echo "Wrong Format" . PHP_EOL;
    exit;
}

if (count($first) == 5) {
    date_default_timezone_set("Europe/Paris");

    $day = $first[0];
    $date = $first[1];
    $month = $first[2];
    $year = $first[3];
    $time = $first[4];

    $time = explode(":", $time);
    $hours = $time[0];
    $minutes = $time[1];
    $sec = $time[2];

    $all_months = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Décembre"];
    $all_days = ["Lundi", "Mardi", "Mercredi", "Ieudi", "Vendredi", "Samedi", "Dimanche"];

    if (!(($date >= 1 && $date <= 31) && (is_numeric($date))) ||
        !(is_numeric($year)) ||
        !(strlen($year) == 4) ||
        (strpos($year, "e") != 0) ||
        !(strlen($minutes) == 2) ||
        !(strlen($hours) == 2) ||
        !(strlen($sec) == 2) ||
        !(($hours >= 0 && $hours <= 23) && (is_numeric($hours))) ||
        !(($minutes >= 0 && $minutes <= 59) && (is_numeric($minutes))) ||
        !(($sec >= 0 && $sec <= 59) && (is_numeric($sec)))
    )
        wrong();

    $is_equal = false;
    for ($i = 0; $i < 12; $i++)
        if (strcasecmp($all_months[$i], $month) == 0) {
            $month = $i + 1;
            $is_equal = true;
        }

    if (!($is_equal))
        wrong();

    $is_equal = false;
    for ($i = 0; $i < 7; $i++)
        if (strcasecmp($all_days[$i], $day) == 0) {
            $day = $i + 1;
            $is_equal = true;
        }
    if (!($is_equal))
        wrong();

    echo mktime($hours, $minutes, $sec, $month, $date, $year) . PHP_EOL;
} else
    wrong();
?>
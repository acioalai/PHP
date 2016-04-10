<?PHP

foreach(array_slice($argv, 1) as $tmp)
    $str = $str.$tmp." ";
$words = array();
$numbers = array();
$other = array();
$str = preg_split('/\s+/',$str);
foreach($str as $tmp)
{
    if (ctype_alpha($tmp))
        array_push($words, $tmp);
    else if (is_numeric($tmp))
        array_push($numbers, $tmp);
    else
        array_push($other, $tmp);
}

function compare($a, $b)
{
    if ($a == $b)
        return true;
    else if ( ord($a) < ord($b) ? false : true);
}
natcasesort($words);
usort($numbers, "compare");
sort($other);
unset($other[0]);

foreach($words as $tmp)
    echo $tmp."\n";
foreach($numbers as $tmp)
    echo $tmp."\n";
foreach($other as $tmp)
    echo $tmp."\n";
?>
<?php
function ft_split($str)
{
    $mystr = preg_split('/\s+/', $str);
    sort($mystr);
    return $mystr;
}
?>
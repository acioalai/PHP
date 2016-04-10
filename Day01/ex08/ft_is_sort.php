<?php
function ft_is_sort($tab)
{
    $cpy_tab = $tab;
    sort($cpy_tab);
    print_r($cpy_tab);
    $i = 1;
    while ($tab[$i]) {
        if ($tab[$i] != $cpy_tab[$i])
            return false;
        $i = $i + 1;
    }
    return true;
}
?>
#!/usr/bin/php
<?php

if ($argc < 2)
    exit;

function get_data($url)
{
    $ch = curl_init();
    $timeout = 5;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

$url = $argv[1];
$data = get_data($url);
preg_match_all('/<img[^>]+>/i', $data, $result);
$sir = $result[0];
for ($j = 0; $j< count($sir); $j++) {
    $result = explode("\"", $sir[$j]);
    $i = 0;
    while ($result[$i]) {
        if ((strpos("http", $result[$i]) !== 0)) {
            $the_link = $result[$i + 1];
            $link_cpy = explode("/", $the_link);
            $last_string = count($link_cpy) - 1;
            $picture_name = $link_cpy[$last_string];
            if (is_dir("./" . $url)) {
                if (!(new \FilesystemIterator("./" . $url))->valid())
                    unlink('$url'.'/'.$picture_name);
                copy($the_link, "./" . $url . "/$picture_name");
            } else {
                mkdir("./" . $url);
                copy($the_link, "./" . $url . "/$picture_name");
            }
            break;
        }
        $i++;
    }
}
?>
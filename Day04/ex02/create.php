<?php

function error()
{
    echo "ERROR\n";
    exit;
}


if (($_POST['login'] != null) && ($_POST['passwd'] != null) && ($_POST['submit'] === "OK"))
{
    $pass = hash('whirlpool', $_POST['passwd']);
    $login = $_POST['login'];
    $user = array("login" => $login, "passwd" => $pass);
    if (file_exists("../private/passwd")) {
        $data = unserialize(file_get_contents("../private/passwd"));
        foreach ($data as $item)
            if ($item["login"] === $login)
                error();
        $data[] = $user;
        file_put_contents("../private/passwd", serialize($data));
        echo "OK\n";
    } else {
        mkdir("../private/");
        $data[] = $user;
        file_put_contents("../private/passwd", serialize($data));
        echo "OK\n";
    }
}else error();

?>

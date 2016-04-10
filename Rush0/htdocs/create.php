<?php

function error()
{
    echo "<h1>Userul NU a fost creat!</h1>\n";
    exit;
}

if (($_POST['login'] != null) && ($_POST['passwd'] != null) && ($_POST['submit'] === "OK"))
{
    $pass = hash('whirlpool', $_POST['passwd']);
    $login = $_POST['login'];
    $cart = [];
    $user = array("login" => $login, "passwd" => $pass, "cart" => $cart);
    if (file_exists("./private/passwd")) {
        $data = unserialize(file_get_contents("./private/passwd"));
        foreach ($data as $item)
            if ($item["login"] === $login)
                error();
        $data[] = $user;
        file_put_contents("./private/passwd", serialize($data));
        echo "<h1>Userul a fost creat!</h1>\n";
    } else {
        mkdir("./private/");
        $data[] = $user;
        file_put_contents("./private/passwd", serialize($data));
        echo "<h1>Userul a fost creat!</h1>\n";
    }
}else error();

?>


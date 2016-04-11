<?php
include '../header.php';

function error($Msg)
{
    echo "<h1>" . "$Msg" . "</h1>\n";
}

function add($user)
{
    if (file_exists("../private/passwd"))
    {
        $data = unserialize(file_get_contents("../private/passwd"));
        foreach ($data as $item)
            if ($item["login"] === $user['login']) {
                error("Exista deja un utilizator cu acest nume !");
                header( 'Refresh: 3; URL=http://myshop.local.42.fr:8080/user/create.php' );
            }
        $data[] = $user;
        file_put_contents("../private/passwd", serialize($data));
        error("Contul a fost creat cu succes !");
        header( 'Refresh: 3; URL=http://myshop.local.42.fr:8080/login/login_html.php' );
    }
    else
    {
        mkdir("../private/");
        $data[] = $user;
        file_put_contents("../private/passwd", serialize($data));
        error("Contul a fost creat cu succes !");
        header( 'Refresh: 3;URL=http://myshop.local.42.fr:8080/login/login_html.php') ;
    }
}

if (($_POST['login'] != null) && ($_POST['passwd'] != null) && ($_POST['submit'] === "OK"))
{
    $pass = hash('whirlpool', $_POST['passwd']);
    $login = $_POST['login'];
    $cart = [];
    $type = "client";
    add(array("login" => $login, "passwd" => $pass, "cart" => $cart, "tip" => $type));

}
else {
    error("Datele sunt gresite!");
    header( 'Refresh: 3;URL=http://myshop.local.42.fr:8080/user/create.php' );
}

?>
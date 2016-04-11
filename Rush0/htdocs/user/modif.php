<?php

include '../header.php';

function error($Msg, $var)
{
    if ($var == 1) {
        echo "<h1>" . "$Msg" . "</h1>\n";
        header('Refresh: 2;URL=http://myshop.local.42.fr:8080/');
    } else if ($var == 2) {
        echo "<h1>" . "$Msg" . "</h1>\n";
        header('Refresh: 2;URL=http://myshop.local.42.fr:8080/user/modif_html.php');
    } else if ($var == 3){
        echo "<h1>" . "$Msg" . "</h1>\n";
        header('Refresh: 2;URL=http://myshop.local.42.fr:8080/user/modif_html.php');
    }
}

if (($_POST['login'] != null) && ($_POST['oldpw'] != null) && ($_POST['newpw'] != null) && ($_POST['submit'] === "OK")) {

    $oldpass = hash('whirlpool', $_POST['oldpw']);
    $login = $_POST['login'];
    $newpass = hash('whirlpool', $_POST['newpw']);
    $data = unserialize(file_get_contents("../private/passwd"));
    $i = 0;
    foreach ($data as $item) {
        if (($item["login"] === $login) && ($item["passwd"] === $oldpass)) {
            $data[$i] = array("login" => $login, "passwd" => $newpass, "cart" => $data[$i]['cart'], "tip" => $data[$i]['tip']);
            file_put_contents("../private/passwd", serialize($data));
            error("Parola a fost schimbata cu succes!", 1);
            break;
        } else if (($item["login"] !== $login) || ($item["passwd"] !== $oldpass)) {
            error("Parola veche este gresita!", 2);
            break;
        } else
            $i++;
    }

} else {
    error("Datele sunt gresite!", 3);
}

?>

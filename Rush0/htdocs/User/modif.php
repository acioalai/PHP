<?php

function error()
{
    echo "ERROR\n";
    exit;
}

if (($_POST['login'] != null) && ($_POST['oldpw'] != null) && ($_POST['newpw'] != null) && ($_POST['submit'] === "OK")) {

    $oldpass = hash('whirlpool', $_POST['oldpw']);
    $login = $_POST['login'];
    $newpass = hash('whirlpool', $_POST['newpw']);
    $user = array("login" => $login, "passwd" => $newpass);
    if (file_exists("../private/passwd")) {
        $data = unserialize(file_get_contents("../private/passwd"));
        $i = 0;
        foreach ($data as $item)
            if (($item["login"] === $login) && ($item["passwd"] === $oldpass)) {
                $data[$i] = $user;
                file_put_contents("../private/passwd", serialize($data));
                echo "OK\n";
            } else if (($item["login"] !== $login) || ($item["passwd"] !== $oldpass))
                error();
            else
                $i++;
    }
} else error();

?>

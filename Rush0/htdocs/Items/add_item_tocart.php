<?php

session_start();

function error()
{
    echo "<h1>Produsul nu a fost adaugat in cos SUUUUUUUS!</h1>\n";
    exit;
}

if (($_POST['submit'] === "OK")) {
    echo $_SESSION['loggued_on_user'].PHP_EOL;
    ECHO "Hristos".PHP_EOL;
    $users = unserialize(file_get_contents("../private/passdw"));
    $products = unserialize(file_get_contents("../private/stock"));
    $user = null;
    var_dump($users);
    foreach ($users as $u)
        if ($u['login'] === $_SESSION['loggued_on_user']) {

            $user = $u;
            break;
        }
    print_r($user);
    $product = null;
    foreach ($products as $p)
        if ($p['nume'] == $_POST['nume']) {
            $product = $p;
            break;
        }
    /*print_r($product);*/
    /*    echo $_POST['cant'];*/
    if (($product['cant'] >= $_POST['cant'])) {
        if ($user['cart'] === null)
            $user['cart'] = [];
        array_push($user['cart'], $product);
        echo "<h1>Produsul a fost adaugat in cos! <a href='../index.php'>Adauga un nou produs</a> <a href='../Login/login.php'>Log In</a></a></h1>\n";
    } else
        echo "<h1>Produsul NU a fost adaugat in cos! <a href='../index.php'>Adauga un nou produs</a> <a href='../Login/login.php'>Log In</a></a></h1>\n";
    $i = 0;
    /*    if ($user['cart'] === null)
            echo "null";
        else
            print_r($user['cart']);*/
    /* if ($user)
         print_r($user);
     else
         echo "null";*/
    foreach ($users as $u) {
        if ($u['login'] == $_POST['loggued_on_user']) {
            $users[$i] = $user;
            break;
        }
        $i++;
    }
    file_put_contents("./private/passwd", serialize($users));

} else error();
?>
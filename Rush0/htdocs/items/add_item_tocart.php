<?php

session_start();

function error($Msg)
{
    echo "<h1>". "$Msg" ."</h1>\n";
   
}

function get_user ()
{
    $users = unserialize(file_get_contents("../private/passwd"));
    foreach ($users as $u)
        if ($u['login'] == $_SESSION['loggued_on_user'])
            return $u;
    return null;
}

function get_product()
{
    $products = unserialize(file_get_contents("../private/stock"));
    foreach ($products as $p)
        if ($p['nume'] == $_POST['nume'])
            return $p;
}

if (($_SESSION['loggued_on_user']) != null) {
    if (($_POST['submit'] === "OK") || (!$_POST['nume']) || (!$_POST['cant'])) {

        $user = get_user();
        $product = get_product();

        if ($product == null) {
            error("Nu exista acest produs");
            header( 'Refresh: 5; URL=http://myshop.local.42.fr:8080/' );
        }
        if ($product['cant'] < $_POST['cant']) {
            error("Cantitate adaugata este prea mare!");
            header('Refresh: 5; URL=http://myshop.local.42.fr:8080/');
        }
        else {
            $product_for_cart = array("nume" => $product['nume'], "cant" => $_POST['cant']);
            $user['cart'][] = $product_for_cart;
            $users = unserialize(file_get_contents("../private/passwd"));
            $i = 0;
            foreach ($users as $u) {
                if (($u['login'] == $user['login'])) {
                    $users[$i] = $user;
                    file_put_contents("../private/passwd", serialize($users));
                    error("Produsul a fost adaugat in cos!");
                    header( 'Refresh: 5; URL=http://myshop.local.42.fr:8080/' );
                    break;
                }
                $i++;
            }
        }
    } else {
        error("Datele sunt gresite!");
        header( 'Refresh: 5; URL=http://myshop.local.42.fr:8080/user/modif.php' );
        
    }
}
else
{
    //neconectat
}
?>
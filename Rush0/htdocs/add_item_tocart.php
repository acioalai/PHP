<?php


function error()
{
    echo "<h1>Produsul nu a fost adaugat!</h1>\n";
    exit;
}

if ($_SESSION['loggued_on_user'] && ($_POST['submit'] === "OK")) {
    $nume_produs = $_POST['nume'];

    $users = unserialize(file_get_contents("./private/passdw"));
    $user = "";
    foreach ($users as $u)
    {
        if ($u['login'] == $_SESSION['loggued_on_user'])
            $user = $u;
    }

    $user_cart = $user['cart'];

    $products = unserialize(file_get_contents("./private/"));
    $product = "";
    foreach ($users as $u)
    {
        if ($u['login'] == $_SESSION['loggued_on_user'])
            $user = $u;
    }

    foreach ($cart as $c)
    {

    }

    foreach ($items as $i) {
        if (($i["nume"] === $name)) {
            $items[$j]["cant"] += $cant;
            $items[$j]["pret"] = $price;
            $ok = true;
        }
        $j++;
    }
    if (!($ok))
        $items[] = $item;
    file_put_contents("./private/stock", serialize($items));
    echo "<h1>Produsul a fost adaugat! <a href='add_item_html.php'>Adauga un nou produs</a> <a href='login.php'>Log In</a></a></h1>\n";

} else error();

?>
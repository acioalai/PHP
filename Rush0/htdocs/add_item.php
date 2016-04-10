<?php

function error()
{
    echo "<h1>Produsul nu a fost adaugat!</h1>\n";
    exit;
}

if ($_POST['nume'] && $_POST['categorie'] && is_numeric($_POST['cant']) && $_POST['pret'] && ($_POST['submit'] === "OK")) {
    $name = $_POST['nume'];
    $category = $_POST['categorie'];
    $cant = (int)$_POST['cant'];
    $price = (float) $_POST['pret'];
    
    if ($price < 0 || $cant < 0)
        error(); 
    $item = array("nume" => $name, "categorie" => $category, "cant" => $cant, "pret" => $price);
    if (file_exists("./private/stock")) {
        $items = unserialize(file_get_contents("./private/stock"));
        $ok = false;
        $j = 0;
        foreach ($items as $i) {
            if (($i["nume"] === $name) && ($i["categorie"] === $category)) {
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
    } else {
        mkdir("./private/");
        $items[] = $item;
        file_put_contents("./private/stock", serialize($items));
        echo "<h1>Produsul a fost adaugat! <a href='add_item_html.php'>Adauga un nou produs</a> <a href='login.php'>Log In</a></a></h1>\n";
    }
} else error();

?>
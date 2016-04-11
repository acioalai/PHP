<?php

session_start();

include './header.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        table {
            margin-top: 5%;
            font-size: 30px;
        }

        tr {
            margin-top: 5px;
        }

        td {
            width: 10%;
        }
    </style>
</head>
<body>

<form method="post" action="items/add_item_tocart.php">
    <div style="margin-left: 20%">
        <table align="center">
            <tr>
                <td><h2>Cosul utilizatorului este:</h2></td>
            </tr>
            <tr>
                <td><h2>Nume produs</h2></td>
                <td><h2>Cantitate</h2></td>
                <td><h2>Pret</h2></td>
            </tr>
            <?php

            $total = 0;
            $users = unserialize(file_get_contents("./private/passwd"));

            $the_user = "al 3-lea hristos";
            foreach ($users as $user)
                if ($user['login'] == $_SESSION['loggued_on_user']) {
                    $the_user = $user;
                    break;
                }

            $products = unserialize(file_get_contents("./private/stock"));

            foreach ($the_user['cart'] as $prod) {
                echo "<tr>";
                echo "<td>";
                echo $prod['nume'];
                echo "</td>";
                echo "<td>";
                echo $prod['cant'];
                echo "</td>";
                echo "<td>";

                foreach ($products as $product) {
                    if ($product['nume'] == $prod['nume']) {
                        echo $product['pret'];
                        $total = $total + (int)$product['pret'] * (int)$prod['cant'];
                    }
                }
                echo "</td>";
                echo "</tr>";
            }
            echo "</hr>";

            ?>
            <tr>
                <td><h2>TOTAL : <?PHP echo $total . PHP_EOL ?> </h2></td>
                <td>
                    <form action="#" method="post">
                        <h1><a class="styled-button" href="#" style="float:right">Finish</a></h1>
                    </form>
                </td>
            </tr>
        </table>
    </div>
</form>

</body>
</html>
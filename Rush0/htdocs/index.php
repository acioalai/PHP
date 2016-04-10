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

<form method="post" action="Items/add_item_tocart.php">
    <table align="center">
        <tr>
            <td><h2>Alege produsul: <input type="text" name="nume" value=""/></h2></td>
            <td><h2>Introdu cantitatea: <input type="text" name="cant" value=""/></h2></td>
            <td><h2><input type="submit" name="submit" value="OK"/></h2></td>
        </tr>
        <tr>
            <td><h2>Nume produs</h2></td>
            <td><h2>Cantitate disponibila</h2></td>
            <td><h2>Pret</h2></td>
        </tr>
        <?php
        $products = unserialize(file_get_contents("./private/stock"));

        foreach ($products as $prod) {
            echo "<tr>";
            echo "<td>";
            echo $prod['nume'];
            echo "</td>";
            echo "<td>";
            echo $prod['cant'];
            echo "</td>";
            echo "<td>";
            echo $prod['pret'];
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</form>

</body>
</html>
<?php

session_start();

include '../header.php';
?>

<html><body>
<form method="post" action="add_item.php">
    Nume: <input type="text" name="nume" value=""/>
    <br/>
    Categorie: 
    <select name="categorie">
        <option value="1">Legume</option>
        <option value="2">Fructe</option>
        <option value="3">Carne</option>
    </select>
    <br/>
    Cantitate: <input type="text" name="cant" value=""/>
    <br/>
    Pret: <input type="text" name="pret" value=""/>
    <br/>
    <input type="submit" name="submit" value="OK"/>
</form>
</body></html>
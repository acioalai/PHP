<?php

include 'header.html';
?>

<html><body>
<form method="post" action="add_item.php">
    Nume: <input type="text" name="nume" value=""/>
    <br/>
    Categorie: 
    <select name="categorie">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
    </select>
    <br/>
    Cantitate: <input type="text" name="cant" value=""/>
    <br/>
    Pret: <input type="text" name="pret" value=""/>
    <br/>
    <input type="submit" name="submit" value="OK"/>
</form>
</body></html>
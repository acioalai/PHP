<?php

session_start();
include '../header.php';

?>

<html>
<body>
<div>
    <table>
        <tr>
            <form method="post" action="add_item_tocart.php">
                Nume: <input type="text" name="nume" value=""/>
                Cantitate: <input type="text" name="cant" value=""/>
                <input type="submit" name="submit" value="OK"/>
            </form>
        </tr>
        </br>
    </table>
</div>
</body>
</html>
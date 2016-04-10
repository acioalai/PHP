<?php

session_start();

include '../header.php';

?>

<html><body>
<form method="post" action="modif.php">
    User: <input type="text" name="login" value=""/>
    <br/>
    Old Password: <input type="password" name="oldpw" value=""/>
    <br/>
    New password: <input type="password" name="newpw" value=""/>
    <br/>
    <input type="submit" name="submit" value="OK"/>
</form>
</body></html>

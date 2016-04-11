<?php
session_start();
include '../header.php';
?>
<html><body>
<form method="post" action="delete_user.php">
    User: <input type="text" name="login" value=""/>
    <br/>
    <input type="submit" name="submit" value="OK"/>
</form>
</body></html>
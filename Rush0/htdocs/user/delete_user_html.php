<?php
session_start();
include '../header.php';
?>
<html><body>
<form method="post" action="delete_user.php">
    Delete User: <input type="text" name="login" value=""/>
    <input type="submit" name="submit" value="OK"/>
</form>
</body></html>
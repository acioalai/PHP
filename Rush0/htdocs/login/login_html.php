<?php

session_start();

include '../header.php';

?>

<html>
<body>
<form method="get" action="login.php">
    User: <input type="text" name="login" value=""/>
    <br/>
    Password: <input type="password" name="passwd" value=""/>
    <br/>
    <input type="submit" name="submit" value="OK"/>
</form>
</body>
</html>
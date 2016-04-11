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


<!--<div class="login-page">
    <div class="form">

        <form class="login-form">
            <input type="text" placeholder="username" name="login" value=""/>
            <input type="password" placeholder="password" name="passwd" value=""/>
            <input type="submit" name="submit" value="OK"/>
            <p class="message">Not registered? <a href="http://myshop.local.42.fr:8080/user/create_html.php">Create an account</a></p>
        </form>
    </div>
</div>
</body>
</html>-->
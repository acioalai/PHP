<?php

session_start();

include '../header.php';
?>

<html>
<body>
<form method="post" action="create.php">
    User: <input type="text" name="login" value=""/>
    <br/>
    Password: <input type="password" name="passwd" value=""/>
    <br/>
    <input type="submit" name="submit" value="OK"/>
</form>
</body>
</html>


<!--<div class="login-page">
    <div class="form">
        <form class="register-form" method="get" action="login.php">
            <input type="text" placeholder="name" name="login" value=""/>
            <input type="password" placeholder="password" name="passwd" value=""/>
            <input type="text" placeholder="email address"/>
            <button>create</button>

            <p class="message">Already registered? <a href="http://myshop.local.42.fr:8080/user/login_html.php">Sign
                    In</a></p>
        </form>
        <form class="login-form" method="get" action="create.php">
            <input type="text" placeholder="username" name="login" value=""/>
            <input type="password" placeholder="password" name="passwd" value=""/>
            <input type="submit" name="submit" value="OK"/>
            <button>Sign up</button>
            <p class="message">Already registered? <a href="http://myshop.local.42.fr:8080/login/login_html.php">Log
                    in</a></p>
        </form>
    </div>
</div>-->
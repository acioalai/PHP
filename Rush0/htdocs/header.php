<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta charset="UTF-8">
</head>
<body style="background-image: url('http://www.planwallpaper.com/static/images/colorful-triangles-background_yB0qTG6_dyJop8X.jpg')">
<nav>
    <div style="margin-bottom: 10px">
        <ul>
            <li><a href="/">Home</a></li>
            <?php if($_SESSION['loggued_on_user'] == "admin"):?>
            <li style="float:right; margin-right: 10px"><a href="http://myshop.local.42.fr:8080/user/delete_user_html.php">Delete user</a></li>
            <?php endif;?>
            <?php if($_SESSION['loggued_on_user'] != null):?>
                <li style="float:right; margin-right: 10px"><a href="http://myshop.local.42.fr:8080/login/logout.php">Log Out</a></li>
                <li style="float:right"><a href="http://myshop.local.42.fr:8080/user/modif_html.php">Modify pass</a></li>
                <li style="float:right"><a>Welcome <?php echo $_SESSION['loggued_on_user']; ?></a></li>
                <li style="float:right"><a href="http://myshop.local.42.fr:8080/cart.php">Cart</a></li>
            <?php else: ?>
                <li style="float:right"><a href="http://myshop.local.42.fr:8080/login/login_html.php">Log in</a></li>
                <li style="float:right"><a href="http://myshop.local.42.fr:8080/user/create_html.php">Sign in</a></li>
            <?php endif;?>
        </ul>
    </div>
</nav>

</body>
</html>
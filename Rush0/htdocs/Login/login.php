<?PHP

session_start();

require('auth.php');

if (auth($_GET['login'], $_GET['passwd']) === TRUE) {
    $_SESSION['loggued_on_user'] = $_GET['login'];
    echo "Userul este acum logat!\n";
    header( 'Location: http://myshop.local.42.fr:8080/' );
} else {
    $_SESSION['loggued_on_user'] = null;
    echo "Userul nu a putut fi logat!\n";
}

?>


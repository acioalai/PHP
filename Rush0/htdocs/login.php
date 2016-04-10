<?PHP

session_start();

require('auth.php');

if (auth($_GET['login'], $_GET['passwd']) === TRUE) {
    $_SESSION['loggued_on_user'] = $_GET['login'];
    echo "Userul este acum logat!\n";
} else {
    $_SESSION['loggued_on_user'] = "";
    echo "Userul nu a putut fi logat!\n";
}

?>


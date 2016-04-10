<?PHP

$action = ( $_GET['action'] == null ) ? null : $_GET['action'];
$name = ( $_GET['name'] == null ) ? null : $_GET['name'];
$value = ( $_GET['value'] == null ) ? null : $_GET['value'];

if ($action === "set")
	setcookie($name, $value, 0);

else if ($action === "get")
{
	if ($_COOKIE[$name] != FALSE)
		echo $_COOKIE[$name].PHP_EOL;
}

else if ($action === "del")
	setcookie($name, "", time() - 3600);

?>

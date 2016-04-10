<?PHP

if (file_exists("../img/42.png"))
{
	header('content-type: image/png');
	readfile("../img/42.png");
}

?>

<?php

function error($Msg)
{
    echo "<h1>" . "$Msg" . "</h1>\n";
}


if (($_POST['login'] != null) && ($_POST['submit'] == "OK"))
{
    if (file_exists("../private/passwd"))
    {
        $data = unserialize(file_get_contents("../private/passwd"));
        $i = 0;
        $sters = false;
        foreach ($data as $u)
        {
            var_dump(1);
            if ($u['login'] == $_POST['login']){
                array_splice($data, $i, 1);
                error("Utilizatorul a fost sters");
                $sters = true;
                break;
            }
            $i++;
        }
        if ($sters == false)
            error("Nu a fost gasit un utilizator cu acest nume!");
        file_put_contents("../private/passwd", serialize($data));
    }

}
else error("Datele sunt gresite!");

?>
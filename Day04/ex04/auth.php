<?PHP

function auth($login, $passwd)
{
    if (!$login || !$passwd || !($data = file_get_contents("../private/passwd")))
        return FALSE;

    $data = unserialize($data);
    $pass = hash('whirlpool', $passwd);

    foreach ($data as $item)
    {
        if ($item['login'] === $login && $item['passwd'] === $pass)
            return TRUE;
    }
    return FALSE;
}
?>

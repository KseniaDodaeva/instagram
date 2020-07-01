<?php
include 'getdb.php';

class Authorization extends login
{
    public static function check($query)
    {
        $sel = self::getDbh()->prepare($query);
        $sel->execute(['name' => $_POST['user_name']]);
        $value = $sel->fetch(PDO::FETCH_ASSOC);
        if ($_POST['user_name'] === $value['user_name']) {
            setcookie("id", $value['ID'], time() + 60 * 60 * 24 * 30, "/");
            header("Location: feed_form.php");
        } else {
            header("Location: error.php");
        }
    }
}

$result = Authorization::check('SELECT ID, user_name, password FROM first_page WHERE user_name = :name');
<?php
include 'getdb.php';

class Person extends login
{
    public static function AddPhoto($access, $query)
    {
        $selectAutUserDB = self::getDbh()->prepare($access);
        $selectAutUserDB->execute(['id' => $_COOKIE['id']]);
        $value = $selectAutUserDB->fetchAll(PDO::FETCH_ASSOC);

        $sel = self::getDbh()->prepare($query);
        if (!file_exists("inst_photo")) {
            mkdir("inst_photo", 0777);
        }

        $end = explode(".", $_FILES['image']['name']);
        $end = array_pop($end);
        $date = date_create_from_format('U.u', microtime(true))->format('YmdHisu');

        foreach ($value as $values) {
            $date = $values['user_name'] . "_" . $date . ".$end";
        }
        move_uploaded_file($_FILES['image']['tmp_name'], "inst_photo" . DIRECTORY_SEPARATOR . "$date");
        $sel->execute([$date, $_COOKIE['id']]);
        header("Location: add_photo_form.php");
    }
}

$result = Person::AddPhoto('SELECT * FROM `first_page` WHERE ID = :id', 'INSERT INTO `photo`(`name`,`userid`) VALUES (?,?)');
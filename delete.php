<?php
include 'getdb.php';
class delete extends login{
    public static function del($query){
        $id = $_GET['id'];
        $sel = self::getDbh()->prepare($query);

        $sel->execute(['id' => $id]);
        unlink("inst_photo/".$id);
        header("Location: feed_form.php");
    }
}

$result = delete::del('DELETE FROM `photo` WHERE `name`=:id');
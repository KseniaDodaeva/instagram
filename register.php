<?php
include 'getdb.php';

class Entrance extends login{
    public static function add($query, $param){
        self::$sth = self::getDbh()->prepare($query);
        return (self::$sth->execute($param)) ? self::getDbh() : 0;
    }

    function go_to_aut(){
        header("Location: /index.php");
    }
}

?>
<?
$insert_id = new Entrance();
$insert_id->add('INSERT INTO first_page(user_name, password) VALUES (?,?)',
    array($_POST['user_name'], $_POST['password']));
$insert_id->go_to_aut();
?>

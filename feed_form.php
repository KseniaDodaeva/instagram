<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="feed.css">
</head>
<body>
<h2>profile</h2>
<form>
    <a href="news_form.php">news</a>
    <a href="add_photo_form.php">add photo</a>
    <a href="logout.php">exit</a>
</form>
<?php
include 'getdb.php';

class Profile extends login
{
    public function cookieView($access)
    {
        $selectAutUserDB = self::getDbh()->prepare($access);
        $selectAutUserDB->execute(['id' => $_COOKIE["id"]]);
    }

    public function view($query)
    {
        $sel = self::getDbh()->query($query)->fetchAll(PDO::FETCH_ASSOC);
        $upd = self::getDbh()->prepare('UPDATE `photo` SET `view` = `view`+1 WHERE `name` = :id LIMIT 1');
        ?>
        <? foreach ($sel as $values) { ?>
        <? if ($values['userid'] === $_COOKIE["id"]) { ?>
            <div class="caption-bottom">
                <h2><? echo $values['user_name'] ?></h2>
                <a href="inst_photo/<?= $values['name'] ?>" target="_blank">
                    <img src="inst_photo/<?= $values['name'] ?>"/>
                </a>
                <a>
                    <? $upd->execute(['id' => $values['name']]); ?>
                    <h4> view: <? echo $values['view']; ?></h4>
                </a>
                <a href="delete.php? id=<?= $values['name'] ?>">delete photo</a>
            </div>
            <?
        }
    } ?>
        <?
    }
}


$result = new Profile();
$result->cookieView('SELECT * FROM `first_page` WHERE ID = :id');
$result->view('SELECT name, view, userid, user_name FROM `photo` JOIN `first_page` ON first_page.ID = photo.userid');
?>
</body>
</html>

<?php
setcookie("id", $_COOKIE['id'], time() - 60 * 60 * 24 * 30, "/");
header("Location: index.php");
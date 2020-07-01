<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="authorization.php" method="post">
    <div class="container">
        <h1>authorization</h1>
        <p>please fill in this form to login in account.</p>
        <hr>

        <label for="email"><b>login</b></label>
        <input type="text" placeholder="enter login" name="user_name" required>

        <label for="psw"><b>password</b></label>
        <input type="password" placeholder="enter password" name="password" required>

        <button type="submit" class="registerbtn">Login</button>
    </div>
    <div class="container signin">
        <p>you don't have an account? <a href="register_form.php">to register</a>.</p>
    </div>
</form>
</body>
</html>
<?php

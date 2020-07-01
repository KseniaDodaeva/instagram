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
<form action="register.php" method="post">
    <div class="container">
        <h1>register</h1>
        <p>please fill in this form to create an account.</p>
        <hr>

        <label for="email"><b>login</b></label>
        <input type="text" placeholder="Enter Login" name="user_name" required>

        <label for="psw"><b>password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <button type="submit" class="registerbtn">Register</button>
    </div>

    <div class="container signin">
        <p>Already have an account? <a href="authorization.php">sign in</a>.</p>
    </div>
</form>
</body>
</html>

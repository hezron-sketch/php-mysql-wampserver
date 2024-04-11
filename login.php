<?php include ('server.php') ?>
<!DOCTYPE html>
<html>

<head>
    <title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body class="container">
    <div class="header">
        <h2>Login</h2>
    </div>
    <div class="content">
        <form method="post" action="login.php">
            <?php include ('errors.php'); ?>
            <div class="input-group">
                <label>Username:</label><br>
                <input type="text" name="username" class="input">
            </div>
            <div class="input-group">
                <label>Password:</label><br>
                <input type="password" name="password" class="input">
            </div>
            <div class="input-group">
                <button type="submit" class="btn" name="login_user">Login</button>
            </div>
            <p>
                Not yet a member? <a href="register.php">Sign up</a>
            </p>
        </form>
    </div>
</body>

</html>
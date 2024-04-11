<?php include ('server.php')
    ?>
<!DOCTYPE html>
<html>

<head>
    <title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body class="container">
    <div class="header">
        <h2>Register</h2>
    </div>
    <div class="content">
        <form method="post" action="register.php">
            <?php include ('errors.php'); ?>
            <div class="input-group">
                <label>Username</label><br>
                <input type="text" name="username" value="<?php echo $username; ?>">
            </div>
            <div class="input-group">
                <label>Name</label><br>
                <input type="text" name="name" value="<?php echo $name; ?>">
            </div>
            <div class="input-group">
                <label>Phone</label><br>
                <input type="tel" name="phone" value="<?php echo $phone; ?>">
            </div>
            <div class="input-group">
                <label>Email</label><br>
                <input type="email" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="input-group">
                <label>Password</label><br>
                <input type="password" name="password_1">
            </div>
            <div class="input-group">
                <label>Confirm password</label><br>
                <input type="password" name="password_2">
            </div>
            <div class="input-group">
                <button type="submit" class="btn" name="reg_user">Register</button>
            </div>
            <p>
                Already a member? <a href="login.php">Sign in</a>
            </p>
        </form>
    </div>
</body>

</html>
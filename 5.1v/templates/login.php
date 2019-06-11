<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prisijungimas</title>
</head>
<body>
    <div id="login">
        <h3>Login</h3>
        <form method="post" action="" name="login">
            <label>Username</label>
            <input type="text" name="username" autocomplete="off" />
            <label>Password</label>
            <input type="password" name="password" autocomplete="off"/>
            <div class="errorMsg"><?php echo $errorMsgLogin; ?></div>
            <input type="submit" class="button" name="loginSubmit" value="Login">
        </form>
    </div>
</body>
</html>
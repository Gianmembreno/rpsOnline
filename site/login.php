<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">

    <title>Log-In</title>
</head>

<body>
    <H1>Log-In</H1>

    <form method="post" action="login.php">
        <div class="input-group">
            <label>Enter Username</label>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label>Enter Password</label>
            <input type="password" name="password">
        </div>
        <br>
        <div class="input-group">
            <button type="submit" class="btn" name="login_user">Login</button>
        </div>
        <p>New Here?<a href="signup.php"> Click here to register! </a> </p>
    </form>

</body>

</html>
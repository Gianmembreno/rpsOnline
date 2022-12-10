<?php include('server.php')?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">

    <title>Sign-Up</title>
</head>

<body>
    <h1>Sign-Up</h1>
    <form method="post" action="signup.php">

        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email">
        </div>
        <div class="input-group">
            <label>Enter Password</label>
            <input type="password" name="password_1">
        </div>
        <div class="input-group">
            <label>Confirm password</label>
            <input type="password" name="password_2">
        </div>
        <br>
        <div class="input-group">
            <button type="submit" class="btn" name="reg_user">
                Register
            </button>
        </div>
        <p>Already having an account?<a href="login.php"> Login Here!</a></p>

    </form>

</body>

</html>
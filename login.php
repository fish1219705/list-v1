<?php

include('includes/connect.php');
include('includes/functions.php');

if(count($_POST))
{

    if($_POST['password'] == EXPORT_PASSWORD)
    {

        $_SESSION['logged_in'] = true;

        header('Location: export.php');
        die();

    }

    header('Location: login.php');
    die();

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    
    <h1>Login</h1>

    <form method="post">

        Password:
        <br>
        <input type="password" name="password" id="password">

        <br>

        <input type="submit" value="Login">

    </form>

</body>
</html>
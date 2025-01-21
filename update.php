<?php

include('includes/connect.php');
include('includes/functions.php');

$query = 'SELECT *
    FROM emails
    WHERE hash = "'.$_GET['hash'].'"
    LIMIT 1';
$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) == 0)
{
    header('Location: error.html');
    die();
}

if(count($_POST))
{

    $query = 'UPDATE emails SET
        news = "'.(isset($_POST['news']) ? 'yes' : 'no').'",
        socials = "'.(isset($_POST['socials']) ? 'yes' : 'no').'",
        advanced = "'.(isset($_POST['advanced']) ? 'yes' : 'no').'"
        WHERE hash = "'.$_GET['hash'].'"
        LIMIT 1';
    mysqli_query($connect, $query);

    header('Location: update.html');
    die();

}

$record = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    
    <h1>Update Email Settings</h1>

    <p>You are updating settings for: <?=$record['email']?>:</p>

    <form method="post">

        <p>News</p>
        <input type="checkbox" name="news" value="yes" 
            <?=($record['news'] == 'yes' ? 'checked' : '')?>
        >

        <p>Socials</p>
        <input type="checkbox" name="socials" value="yes" 
            <?=($record['socials'] == 'yes' ? 'checked' : '')?>
        >

        <p>Advanced</p>
        <input type="checkbox" name="advanced" value="yes" 
            <?=($record['advanced'] == 'yes' ? 'checked' : '')?>
        >

        <input type="hidden" name="submit" value="true">
        <input type="submit" value="Sign Up">

    </form>

</body>
</html>
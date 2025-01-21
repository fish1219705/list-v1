<?php

include('includes/connect.php');
include('includes/functions.php');

if(!isset($_SESSION['logged_in']))
{
    header('Location: login.php');
    die();
}

if(isset($_GET['list']))
{

    $query = 'SELECT *
        FROM emails
        WHERE '.$_GET['list'].' = "yes"';
    $result = mysqli_query($connect, $query);

    header("Content-type: application/csv");
    header("Content-Disposition: attachment; filename=".$_GET['list'].".csv");
    header("Pragma: no-cache");
    header("Expires: 0");

    echo 'id,hash,emails,socials,advanced,news,ip,created_at,updated_at'.chr(13);

    while($record = mysqli_fetch_assoc($result))
    {
        echo implode(',', $record).chr(13);
    }

    die();


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export</title>
</head>
<body>

    <h1>Export</h1>
    
    <a href="export.php?list=news">Export News</a>
    <a href="export.php?list=socials">Export Socials</a>
    <a href="export.php?list=advanced">Export Advanced</a>

    <a href="logout.php">Logout</a>

    <?php print_r($_SESSION); ?>

</body>
</html>
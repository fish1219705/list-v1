<?php

include('includes/connect.php');
include('includes/functions.php');

if(count($_POST))
{

    $query = 'INSERT INTO emails (
            email,
            hash,
            ip
        ) VALUES (
            "'.$_POST['email'].'",
            "'.random_string().'",
            "'.get_user_ip().'"
        )';
    mysqli_query($connect, $query);

    header('Location: signup.html');
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
    
    <h1>Sign Up</h1>

    <form method="post">

        Email:
        <br>
        <input type="email" name="email" id="email">
        <div id="email-error"></div>

        <br>

        <input type="submit" value="Sign Up" onclick="return validateForm()">

    </form>

    <script>
    function validateForm() {
        let errors = 0;

        let email_pattern = "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$";
        let email = document.getElementById("email");
        let email_error = document.getElementById("email-error");
        email_error.innerHTML = "";
        if (email.value == "") {
            email_error.innerHTML = "(email is required)";
            errors++;
        } else if (!email.value.match(email_pattern)) {
            email_error.innerHTML = "(email is invalid)";
            errors++;
        }

        if (errors) return false;
    }
</script>

</body>
</html>
<?php

declare(strict_types=1);

function check_login_errors() : void
{
    if (isset($_SESSION["errors_login"]))
    {
        $errors = $_SESSION["errors_login"];
        foreach ($errors as $error)
        {
            echo "<p class='error'>$error</p>";
            // set visibility style to show
            echo "<style>.output_msg_login {visibility: visible;}</style>";
        }

        unset($_SESSION["errors_login"]);
    }
    else if(isset($_GET["login"]))
    {
        if ($_GET["login"] == "success")
        {
            echo "<p class='success'>Login successful!</p>";
            // set visibility style to show
            echo "<style>.output_msg_login {visibility: visible;}</style>";
        }
    } 
}
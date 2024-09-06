<?php

declare(strict_types=1);

function check_signup_errors(): void
{
    if (isset($_SESSION["errors"]))
    {
        $errors = $_SESSION["errors"];
        foreach ($errors as $error)
        {
            echo "<p class='error'>$error</p>";
            // set visibility style to show
            echo "<style>.output_msg {visibility: visible;}</style>";
        }

        unset($_SESSION["errors"]);
    }
    else if(isset($_GET["signup"]))
    {
        if ($_GET["signup"] == "success")
        {
            echo "<p class='success'>Sign up successful!</p>";
            // set visibility style to show
            echo "<style>.output_msg {visibility: visible;}</style>";
        }
    }
}
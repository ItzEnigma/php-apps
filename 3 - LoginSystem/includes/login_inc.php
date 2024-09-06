<?php

if ( $_SERVER["REQUEST_METHOD"] == "POST" )
{
    require_once 'dbh_inc.php';
    $username = $_POST["user_name"];
    $password = $_POST["pass_word"];
    try{
        require_once 'login_model_inc.php';
        require_once 'login_ctrller_inc.php';

        $errors = []; // array to store errors

        if (is_input_empty($username, $password))
        {
            $errors["empty_input"] = "Fill in all fields!"; 
        }

        $result = get_username($pdo, $username);
        if (!is_username_correct($result))
        {
            $errors["invalid_username"] = "Invalid Username!";
        }

        if( !empty($result) )
        {
            $hashed = $result["pwd"];
            if (!is_password_correct($password, $hashed))
            {
                $errors["invalid_password"] = "Incorrect Password!";
            }
        }

        require_once "config_session_inc.php";

        // if there are no errors, insert the user into the database
        if (empty($errors))
        {
            // do action
            $newSessionId = session_create_id();
            $sessionId = $newSessionId . "_" . $result["id"];
            session_id($sessionId);
            $_SESSION["user_id"] = $result["id"];
            $_SESSION["user_name"] = htmlspecialchars($result["username"]);
            $_SESSION["last_regeneration"] = time();    // reset the last_regeneration time
            header("Location: ../index.php?login=success");
            close_connection();
            die();
        }
        else
        {
            $_SESSION["errors_login"] = $errors;
            header("Location: ../index.php");
            close_connection();
            die();
        }
    }
    catch(PDOException $e){
        header("Location: ../index.php");
        echo "Query failed: " . $e->getMessage();
        die("Query failed: " . $e->getMessage());
    }
}
else
{
   header("Location: ../index.php");
    die();
}
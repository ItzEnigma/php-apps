<?php

 if ( $_SERVER["REQUEST_METHOD"] == "POST" )
 {
    try{
		require_once 'dbh_inc.php';
        $username = $_POST["user_name"];
        $password = $_POST["pass_word"];
        $email = $_POST["email"];
        
        require_once 'signup_model_inc.php';
        require_once 'signup_ctrller_inc.php';

        $errors = []; // array to store errors

        if (is_input_empty($username, $password, $email))
        {
            $errors["empty_input"] = "Fill in all fields!"; 
        }

        if (is_email_invalid($email))
        {
            $errors["invalid_email"] = "Invalid email!";
        }

        if (is_username_taken($pdo, $username))
        {
            $errors["username_taken"] = "Username already taken!";
        }

        if (is_email_registered($pdo, $email))
        {
            $errors["email_registered"] = "Email already registered!";
        }

        require_once "config_session_inc.php";

        // if there are no errors, insert the user into the database
        if (empty($errors))
        {
            insert_user($pdo, $username, $password, $email);
            header("Location: ../index.php?signup=success");
            close_connection();
            die();
        }
        else
        {
            $_SESSION["errors"] = $errors;
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

 function close_connection()
 {
    $pdo = null;
    $stmt = null;
 }
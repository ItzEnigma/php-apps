<?php

if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
    $name = $_POST["username"];
    $email = $_POST["email"];
    $r_date = $_POST["resv_date"];

    /* Create a connection to the database */
    require_once("db_inc.php");

    /* Initialize an array to store errors */
    $errors = [];

    /* Check data before inserting into the database */
    if (input_isEmpty($name, $email, $r_date)) {
        $errors["empty_fields"] = "Please fill all the fields";
    }

    if (is_email_correct($email)) {
        $errors["email_error"] = "Invalid email format";
    }

    if (is_date_correct($r_date)) {
        $errors["date_error"] = "Invalid date format";
    }

    require_once("config_session_inc.php");

    if(empty($errors)) {
        insert_into_DB($pdo, $name, $email, $r_date);
        header("Location: index.php");
        $pdo = null; // Close the connection
        die("Data inserted successfully");
    }
    else {
        $_SESSION["errors"] = $errors;
        header("Location: index.php");
        $pdo = null; // Close the connection
        die("Errors found");
    }
}
else
{
    header("Location: index.php");
    die("Please fill the form first");
}

function input_isEmpty($name, $email, $r_date)
{
    return empty($name) || empty($email) || empty($r_date);
}

function is_email_correct( $email )
{
    $result = false;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $result = true;
    }
    return $result;
}

function is_date_correct( $date )
{
    return !preg_match("/\d{4}-\d{2}-\d{2}/", $date);
}

function insert_into_DB( $pdo, $name, $email, $r_date )
{
    $query = "INSERT INTO patients (patient, email, Reserve_Date) VALUES (:patient, :email, :r_date)";
    $stmt = $pdo->prepare($query);
    $stmt->execute(["patient" => $name, "email" => $email, "r_date" => $r_date]);
}

?>
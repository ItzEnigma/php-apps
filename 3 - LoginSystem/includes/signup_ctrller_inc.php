<?php

declare(strict_types=1);

function is_input_empty(string $username, string $password, string $email): bool
{
    $result = false;
    if (empty($username) || empty($password) || empty($email))
    {
        $result = true;
    }
    return $result;
}

function is_email_invalid(string $email): bool
{
    $result = false;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $result = true;
    }
    return $result;
}

function is_username_taken(object $pdo, string $username)
{
    $result = get_username($pdo, $username);
    if($result)
    {
        return true;
    }

    return $result;
}

function is_email_registered(object $pdo, string $email)
{
    $result = get_email($pdo, $email);
    if($result)
    {
        return true;
    }

    return $result;
}

function insert_user(object $pdo, string $username, string $password, string $email): void
{
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (username, pwd, email) VALUES (:username, :pass, :email)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["username" => $username, "pass" => $hashed_password, "email" => $email]);
}
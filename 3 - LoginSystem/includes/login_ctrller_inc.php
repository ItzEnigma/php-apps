<?php

declare(strict_types=1);

function is_input_empty(string $username, string $password): bool
{
    $result = false;
    if (empty($username) || empty($password))
    {
        $result = true;
    }
    return $result;
}

function is_username_correct(array|bool $username)
{
    if ( $username )
    {
        return true;
    }
    return false;
}

function is_password_correct(string $password, string $hashed_pass)
{
    if ( password_verify($password, $hashed_pass) )
    {
        return true;
    }
    return false;
}
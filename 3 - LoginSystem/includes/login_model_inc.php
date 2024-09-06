<?php

declare(strict_types=1);

function get_username(object $pdo, string $username)
{
    $query = "SELECT * FROM users WHERE username=:u_name;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':u_name', $username, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);   // fetch() returns an array of associative arrays

    return $result;
}
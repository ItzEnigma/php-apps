<?php

$server_name = "mySQL_DB";  // Change this to your server name
$database_name = "hospital_sys";
$username = "hotel_user";
$password = "1234"; // Default password is empty
$dsn = "mysql:host=$server_name;dbname=$database_name";
try{
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}
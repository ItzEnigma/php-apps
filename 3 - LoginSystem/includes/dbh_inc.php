<?php
/* DataBase Handler */
$servername = "localhost"; // if it's not localhost, use the host information
$database_name = "loginsystemdb";
$dsn = "mysql:host=$servername;dbname=$database_name"; // Data Source Name
$dbUsername = "root";
$dbPassword = ""; // Default password is empty

try{
    $pdo = new PDO($dsn, $dbUsername, $dbPassword); // PDO --> PHP Data Object
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
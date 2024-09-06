<?php
    $servername = "mySQL_DB"; // Change this to your server name (for DB)
    $database_name = "crud";
    $dsn = "mysql:host=$servername;dbname=$database_name"; // Data Source Name
    $dbUsername = "crud_user";
    $dbPassword = "1234"; // Default password is empty

	try{
		$pdo = new PDO($dsn, $dbUsername, $dbPassword); // PDO --> PHP Data Object
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
	}
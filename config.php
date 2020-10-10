<?php
$host = "localhost";
$userName = "root";
$password = "";
$database = "contact_form";

//Custom PDO options.
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);
 
//Connect to MySQL and instantiate PDO object.

try {
	$pdo = new PDO("mysql:host=$host;dbname=$database", $userName, $password, $options);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}


?>
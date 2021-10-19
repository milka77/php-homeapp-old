<?php

// database parameters
$db_host = 'localhost';
$db_name = 'homeapp';
$db_username = 'root';
$db_password = '';

$dsn = "mysql:host=$db_host;dbname=$db_name";

// connect to the database
try {
    $db_connection = new PDO($dsn, $db_username, $db_password);
} catch (Exception $e) {
    echo "There was a failure - " . $e->getMessage();
}

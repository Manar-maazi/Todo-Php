<?php
$server = "localhost";
$db_name = "db_todo";
$db_user = "root";
$db_pass = "";

try {
    $connection = new PDO("mysql:host=$server;dbname=$db_name", $db_user, $db_pass);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();  // Stop execution if connection fails
}
?>

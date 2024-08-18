<?php
/*
try {
    $pdo = new PDO('sqlite:'. __DIR__ . '\\db.sqlite');
    // Set error mode to exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . '<br>';
}
*/

$host = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "mediashelf";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set error mode to exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("\nERROR: Connection failed: " . $e->getMessage());
}
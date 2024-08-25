<?php

$host     = is_file("/.dockerenv") ? "db" : "localhost";
$dbname   = "mediashelf";
$username = "postgres";
$password = "postgres";

try {
    $pdo = new PDO("pgsql:host=$host;port=5432;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("\nERROR: Connection failed: " . $e->getMessage());
}
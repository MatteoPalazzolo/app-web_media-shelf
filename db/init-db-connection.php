<?php
try {
    $pdo = new PDO('sqlite:'. __DIR__ . '\\db.sqlite');
    // Set error mode to exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . '<br>';
}
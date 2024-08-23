<?php

if ($_SERVER['REQUEST_METHOD'] !== 'GET') die("request method not allowed");

require_once __DIR__ . '/../../components/card/card.php';
require      __DIR__ . '/../db/init-db-connection.php';

// create cards from db content
try {
    $sql = "SELECT id, m_title, m_year, m_rating, m_color_one, m_color_two, m_color_three FROM media ORDER BY id DESC";
    $stmt = $pdo->query($sql);
    $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($entries as $entry) {
        UI_RenderCard(
            $entry['id'],
            $entry['m_title'],
            $entry['m_year'],
            $entry['m_rating'],
            $entry['m_color_one'],
            $entry['m_color_two'],
            $entry['m_color_three']
        );
    }
} catch (PDOException $e) {
    die("\nERROR: Create cards from db content failed: " . $e->getMessage());
}
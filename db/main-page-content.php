<?php

require_once '../components/card/card.php';
require 'init-db.php';

// create cards from db content
try {
    $sql = "SELECT * FROM media";
    $stmt = $pdo->query($sql);
    $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($entries as $entry) {
        UI_RenderCard2(
            $entry['m_title'],
            $entry['m_date'],
            $entry['m_rating'],
            $entry['m_img_url'],
            $entry['m_color_two'],
            $entry['m_color_three']
        );
    }
} catch (PDOException $e) {
    die( "create cards from db content failed: " . $e->getMessage() . '<br>' );
}

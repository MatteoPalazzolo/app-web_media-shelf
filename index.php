<?php
    require_once __DIR__ . '/api/db/forge-db.php';
    require_once __DIR__ . '/utils/utils.php';

    try {
        $sql = "SELECT m_color_one, m_color_two, m_color_three FROM media WHERE m_active=1;";
        $stmt = $pdo->query($sql);
        $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!isset($entries[0])) {
            print_r($entries);
            die("\nERROR: No active card palette found.");
        }
        $colors = $entries[0];
    } catch (PDOException $e) {
        die("\nERROR: Create cards from db content failed: " . $e->getMessage());
    }

    $hama = "#FFF";
    $mudo = "#000";

    $agi_contrast  = isColorBright($colors['m_color_one']) ? $mudo : $hama;
    $bufu_contrast = isColorBright($colors['m_color_two']) ? $mudo : $hama;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intro</title>
    <!-- JS CDN -->
    <script src="https://unpkg.com/htmx.org@2.0.2"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/color-thief/2.3.0/color-thief.umd.js"></script>
    <script src="assets/js/color-utils.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/init.css">
    <style>
    :root {
        --color-agi:            <?= $colors['m_color_one']  ?>;
        --color-bufu:           <?= $colors['m_color_two']  ?>;
        --color-zio:            <?= $colors['m_color_three']?>;
        --color-hama:           <?= $hama                   ?>;
        --color-mudo:           <?= $mudo                   ?>;
        --color-contrast-agi:   <?= $agi_contrast           ?>;
        --color-contrast-bufu:  <?= $bufu_contrast          ?>;
    }
    </style>
</head>
<body>
    <!-- <div hx-get="/pages/intro/intro.php" hx-trigger="load" hx-target="body"></div> -->
    <div hx-get="/pages/main/main.php" hx-trigger="load" hx-target="body"></div>
</body>
</html>
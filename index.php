<?php
    require_once __DIR__ . '/api/db/forge-db.php';
    require_once __DIR__ . '/assets/php/utils.php';

    try {
        $sql = "SELECT m_color_one, m_color_two, m_color_three FROM media WHERE m_active=true";
        $stmt = $pdo->query($sql);
        $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!isset($entries[0])) {
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <title>MediaShelf</title>
    <!-- JS CDN -->
    <script src="https://unpkg.com/htmx.org@2.0.2"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/color-thief/2.3.0/color-thief.umd.js"></script>
    <script src="assets/js/color-utils.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/init.css">
    <link rel="stylesheet" href="assets/css/scrollbar.css">
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
    <script>
        $.ajax({
            // url: '/pages/intro/intro.php' + window.location.search,
            url: '/pages/main/main.php' + window.location.search,
            type: 'GET',
            success: function(response) {
                var iserror = response.split("\n");
                if (iserror[iserror.length - 1].slice(0,5) === "ERROR") {
                    alert(response);
                } else {
                    $("body").html(response);
                }
            },
            error: function(xhr, status, error) {
                console.error("An error occurred while loading in index.php: " + error);
            }
        });

        console.group("GET params info");
        console.info("num=[0 < int < 300] : ammount of rendered stars per parallax layer (3 layers)");
        console.info("str=[0 < int < 100] : determines how heavily the generated random values are biased towards the upper part of the page");
        console.groupEnd();
    </script>
</body>
</html>
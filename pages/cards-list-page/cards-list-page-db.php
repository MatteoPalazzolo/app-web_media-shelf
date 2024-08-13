<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        <?= file_get_contents(__DIR__ . "/cards-list-page.css"); ?>
    </style>
</head>
<body>
    <div class="page-background"></div>
    <div class="container">
        
        <?php
            require_once '../../components/card-2/card-2.php';
            require '../../db/init-db.php';

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

        ?>

    </div>
    
</body>
</html>
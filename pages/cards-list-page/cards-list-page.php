<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        .container {
            display: flex;
        }
        <?= file_get_contents(__DIR__ . "/cards-list-page.css"); ?>
    </style>
</head>
<body>
    <div class="page-background"></div>
    <div class="container">
        
        <?php
            require_once("../../components/card/card.php");
            UI_RenderCard("Citizen Kane", 1942, 4, "https://flxt.tmsimg.com/assets/p1485_p_v8_aa.jpg");
            UI_RenderCard("Casablanca", 1942, 2, "https://cdn11.bigcommerce.com/s-j3ptcnmq25/images/stencil/2560w/products/1883/3416/51cNCX-dOkL__89126__03005.1627579337.jpg");
        ?>

    </div>
    
</body>
</html>
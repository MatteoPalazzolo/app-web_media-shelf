<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <link rel="stylesheet" href="pages/persona.css">
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
        }
        <?= file_get_contents("./persona.css"); ?>
    </style>
</head>
<body>
    <div class="page-background"></div>
    <div class="container">
        
        <div class="card">
            <div class="bg-one"></div>
            <div class="bg-two"></div>
            <div class="bg-three"></div>
            <p class="year">1942</p>

            <img src="https://flxt.tmsimg.com/assets/p1485_p_v8_aa.jpg" alt="">
            <h2 class="title">Citizen Kane</h2>
            <p class="rating neonText"> ★★★★☆ </p>
        </div>

        <div class="card">
            <div class="bg-one"></div>
            <div class="bg-two"></div>
            <div class="bg-three"></div>
            <p class="year">1942</p>

            <img src="https://cdn11.bigcommerce.com/s-j3ptcnmq25/images/stencil/2560w/products/1883/3416/51cNCX-dOkL__89126__03005.1627579337.jpg" alt="">
            <h2 class="title">Casablanca</h2>
            <p class="rating"> ★★☆☆☆ </p>
        </div>
    </div>
    
</body>
</html>
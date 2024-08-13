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
        @font-face {
            font-family: 'Persona';
            src: url('../../assets/fonts/heavy-heap-rg.otf');
        }

        @font-face {
            font-family: 'PersonaBold';
            src: url('../../assets/fonts/MightySouly-lxggD.ttf');
        }
        <?= file_get_contents(__DIR__ . "/cards-list-page.css"); ?>
    </style>
</head>
<body>
    <div class="page-background"></div>
    <div class="container">
        
        <?php
            require_once("../../components/card-1/card-1.php");
            require_once("../../components/card-2/card-2.php");
            UI_RenderCard2("Citizen Kane", 1942, 4, "https://flxt.tmsimg.com/assets/p1485_p_v8_aa.jpg",
                            "#1A5058","#E9490B");
            UI_RenderCard2("Casablanca", 1942, 4, "https://cdn11.bigcommerce.com/s-j3ptcnmq25/images/stencil/2560w/products/1883/3416/51cNCX-dOkL__89126__03005.1627579337.jpg",
                            "#4E4441","#E9DFDA");
            UI_RenderCard2("Dark Souls 1", 2011, 5, "https://m.media-amazon.com/images/M/MV5BYTk4YmExZGUtZWIyYy00MzRjLWIzMzYtYmRmOGUyOWIxNjU1XkEyXkFqcGdeQXVyMTA0MTM5NjI2._V1_.jpg",
                            "#28829C","#E0F1F7");
            UI_RenderCard2("Cowboy Bebop", 1998, 5, "https://www.themoviedb.org/t/p/original/7zcIgfFGtHGyvS9tQhCFmjoMu14.jpg",
                            "#CB2C16","#CC548C");
            UI_RenderCard2("Evangelion", 1995, 5, "https://m.media-amazon.com/images/M/MV5BMTc4YTY0MDUtYWNmMi00NTRiLWE4NmItM2JiMmIzYmEwNGQzXkEyXkFqcGdeQXVyNTkwNzYyODM@._V1_.jpg",
                            "#4F4669","#DA3731");
            UI_RenderCard2("Persona 4 Golden", 2012, 5, "https://www.juegostorrentpc.net/wp-content/uploads/2020/07/P4G-Cover.jpg",
                            "#ffa500","#fff523");
        ?>

    </div>
    
</body>
</html>
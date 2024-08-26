<?php
require_once __DIR__ . "/../../assets/php/utils.php";
require_once __DIR__ . "/../../components/starry-background/starry-background.php";
?>

<style>
<?= file_get_contents("./main.css"); ?>
<?= file_get_contents("./parallax-background.css"); ?>
<?php for ($i=0; $i<50; $i++): ?>
    .parallax.shine .milky-way > svg:nth-child(<?= $i ?>) {
        animation: star-shine <?= randomFloat(1,3) ?>s infinite;
    }
<?php endfor ?>
</style>

<main>
    <header>
        <svg id="add-card" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 261.02 261.02">
            <circle style="fill:none;stroke:var(--color-agi);stroke-miterlimit:10;stroke-width:10px;" cx="130.51" cy="130.51" r="125"/>
            <g id="draw-card-icon" onclick="toggleAddCardMenu();">
                <circle fill="var(--color-agi)" cx="130.51" cy="130.51" r="60"/>
                <path fill="var(--color-contrast-agi)" transform="translate(-11.22 -11.22)" d="M176.11,117.72l-3.08-1,.71-2.11,3.09,1Z" transform="translate(-13.72 -11.22)"/>
                <path fill="var(--color-contrast-agi)" transform="translate(-11.22 -11.22)" d="M153,95.19l-.17-1.69-37.07,4,3.41,33.14-9.79,12.41-.13.19a9.73,9.73,0,0,0,.62,9.83,30.14,30.14,0,0,0,2.3,3c4.54,5.52,12.82,16.62,9.9,33.83h3.39c3.18-18.68-5.9-30-10.77-35.9a31.32,31.32,0,0,1-2.05-2.66A6.58,6.58,0,0,1,112,145l7.62-9.67,1.94,18.83,11-1.16c-.6,4.89-1.18,9.46-1.2,9.54l3.24.42c.08-.64,2-15.65,2.45-20.24.2-2,1.11-6.68,5.33-6.4,2.61.16,3,3,3,3.51V158.4l.14.32c7.67,17.16.87,20.77.83,20.79l-1,.43v10h3.26V181.9a9.09,9.09,0,0,0,2.91-4.06c1.84-4.8.86-11.57-2.91-20.13v-3.8l13.49,5.19,13.28-39.32-3.08-1-12.2,36.1-9.67-3.72,8.14-.86-5.27-51.45,22.86,8.49-1.4,4.14,3.09,1,2.41-7.14Z"/>
            </g>
        </svg>
    </header>
    <div class="parallax shine">
        <?php 
            $count    = (int) (isset($_GET['num']) && $_GET['num'] >  0 && $_GET['num'] < 300 ? $_GET['num'] : 15); 
            $strength = (int) (isset($_GET['str']) && $_GET['str'] >= 1 && $_GET['str'] < 100 ? $_GET['str'] :  3); 
        ?>
        <div class="parallax-layer layer-back-back-back">
            <div class="milky-way back-back-back">
                <?php for ($i=0; $i<$count; $i++) {
                    $top =      randomInvFloat(0,100,$strength);
                    $left =     randomFloat(0,100);
                    $scale =    randomFloat(20,35);
                    UI_RenderRandomStar($top,$left,$scale);
                } ?>
            </div>
        </div>
        <div class="parallax-layer layer-back-back">
            <div class="milky-way back-back">
                <?php for ($i=0; $i<$count; $i++) {
                    $top =      randomInvFloat(0,100,$strength);
                    $left =     randomFloat(0,100);
                    $scale =    randomFloat(35,50);
                    UI_RenderRandomStar($top,$left,$scale);
                } ?>
            </div>
        </div>
        <div class="parallax-layer layer-back">
            <div class="milky-way back">
                <?php for ($i=0; $i<$count; $i++) {
                    $top =      randomInvFloat(0,100,$strength);
                    $left =     randomFloat(0,100);
                    $scale =    randomFloat(50,65);
                    UI_RenderRandomStar($top,$left,$scale);
                } ?>
            </div>
        </div>
        <div class="parallax-layer layer-base">
            <div id="card-container" class="card-container"></div>
        </div>
    </div>
</main>

<script>
    function refreshCardList() {
        $.ajax({
        url: '/api/get/main-page-content.php' + window.location.search,
        type: 'GET',
        success: function(response) {
            var iserror = response.split("\n");
            if (iserror[iserror.length - 1].slice(0,5) === "ERROR") {
                alert(response);
            }
            $("#card-container").html(response);
            $(".milky-way").css("height", $("#card-container").height());
        },
        error: function(xhr, status, error) {
            console.error("An error occurred while refreshing the card list: " + error);
        }});
    }
    $(document).ready(refreshCardList);
    $(window).on("resize", () => {
        $(".milky-way").css("height", $("#card-container").height());
    });
    
</script>

<?php
require_once __DIR__ . "/../../components/new-card-form/form.php";
require_once __DIR__ . "/../../components/refresh-cards/refresh.php";
?>
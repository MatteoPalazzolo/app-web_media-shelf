<?php
require_once __DIR__ . "/../../utils/utils.php";
require_once __DIR__ . "/../../components/starry-background/starry-background.php";
?>

<style>
<?= file_get_contents("./main.css"); ?>
<?= file_get_contents("./parallax-background.css"); ?>
<?php for ($i=0; $i<50; $i++): ?>
    .milky-way > svg:nth-child(<?= $i ?>) {
        animation: star-shine <?= randomFloat(1,3) ?>s infinite;
    }
<?php endfor ?>
</style>

<main>
    <header>
        <!-- 
        <svg class="ui-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
            <circle style="fill:none;stroke:var(--color-agi);stroke-width:1.3;stroke-miterlimit:10;" cx="16" cy="16" r="11"/>
        </svg>
        <svg class="add-card" xmlns="http://www.w3.org/2000/svg" viewBox="-20.0 -10.0 128.0 120.0" onclick="toggleAddCardMenu();">
            <circle style="fill:none;stroke:var(--color-agi);stroke-width:1.3;stroke-miterlimit:10;" cx="50%" cy="50%" r="100"/>
            <g class="draw-card-icon">
                <circle fill="var(--color-agi)" cx="47.5" cy="50" r="60"/>
                <path fill="var(--color-contrast-agi)" d="m81.879 25.984-3.0859-1.043 0.71484-2.1133 3.0859 1.043z"/>
                <path fill="var(--color-contrast-agi)" d="m58.73 3.4609-0.17188-1.6953-37.066 4.0547 3.4023 33.133-9.7891 12.418-0.125 0.1875c-0.10938 0.1875-2.6328 4.6211 0.61328 9.832 0.52344 0.83594 1.3086 1.7969 2.3047 3.0078 4.5352 5.5234 12.82 16.617 9.8984 33.832h3.3945c3.1719-18.68-5.9062-29.977-10.773-35.902-0.88281-1.0781-1.6484-2.0078-2.0547-2.6641-2.0078-3.2227-0.84375-5.9102-0.60547-6.3906l7.6211-9.668 1.9336 18.828 10.969-1.1523c-0.60156 4.8906-1.1875 9.4609-1.1992 9.5391l3.2344 0.41406c0.082032-0.63672 2-15.645 2.4492-20.234 0.19922-2.0156 1.1094-6.6797 5.3359-6.4062 2.6094 0.16406 2.9961 2.9961 3.0469 3.5117v18.566l0.14062 0.31641c7.668 17.16 0.86719 20.773 0.82422 20.793l-0.96875 0.42969v10.02l3.2617 0.003906v-8.0703c0.85547-0.64844 2.0781-1.8867 2.9102-4.0547 1.8438-4.8047 0.86328-11.574-2.9102-20.129v-3.8008l13.492 5.1875 13.281-39.32-3.0859-1.043-12.195 36.102-9.6758-3.7188 8.1484-0.85938-5.2695-51.453 22.859 8.4922-1.3984 4.1406 3.0859 1.043 2.4141-7.1406z"/>
            </g>
        </svg>
        -->
        <svg id="add-card" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 261.02 261.02">
            <circle style="fill:none;stroke:var(--color-agi);stroke-miterlimit:10;stroke-width:10px;" cx="130.51" cy="130.51" r="125"/>
            <g id="draw-card-icon" onclick="toggleAddCardMenu();">
                <circle fill="var(--color-agi)" cx="130.51" cy="130.51" r="60"/>
                <path fill="var(--color-contrast-agi)" transform="translate(-11.22 -11.22)" d="M176.11,117.72l-3.08-1,.71-2.11,3.09,1Z" transform="translate(-13.72 -11.22)"/>
                <path fill="var(--color-contrast-agi)" transform="translate(-11.22 -11.22)" d="M153,95.19l-.17-1.69-37.07,4,3.41,33.14-9.79,12.41-.13.19a9.73,9.73,0,0,0,.62,9.83,30.14,30.14,0,0,0,2.3,3c4.54,5.52,12.82,16.62,9.9,33.83h3.39c3.18-18.68-5.9-30-10.77-35.9a31.32,31.32,0,0,1-2.05-2.66A6.58,6.58,0,0,1,112,145l7.62-9.67,1.94,18.83,11-1.16c-.6,4.89-1.18,9.46-1.2,9.54l3.24.42c.08-.64,2-15.65,2.45-20.24.2-2,1.11-6.68,5.33-6.4,2.61.16,3,3,3,3.51V158.4l.14.32c7.67,17.16.87,20.77.83,20.79l-1,.43v10h3.26V181.9a9.09,9.09,0,0,0,2.91-4.06c1.84-4.8.86-11.57-2.91-20.13v-3.8l13.49,5.19,13.28-39.32-3.08-1-12.2,36.1-9.67-3.72,8.14-.86-5.27-51.45,22.86,8.49-1.4,4.14,3.09,1,2.41-7.14Z"/>
            </g>
        </svg>
    </header>
    <div class="parallax">
        <?php 
            $star_count =   isset($_GET['num']) && $_GET['num'] > 0 && $_GET['num'] < 300 ? $_GET['num'] : 35; 
            $inv_strength = isset($_GET['str']) && $_GET['str'] > 0 && $_GET['str'] < 100 ? $_GET['str'] :  3; 
        ?>
        <div class="parallax-layer layer-back-back-back">
            <div class="milky-way back-back-back">
                <?php for ($i=0; $i<$star_count; $i++) {
                    $top =      randomInvFloat(0,100,$inv_strength);
                    $left =     randomFloat(0,100);
                    $scale =    randomFloat(20,35);
                    UI_RenderRandomStar($top,$left,$scale);
                } ?>
            </div>
        </div>
        <div class="parallax-layer layer-back-back">
            <div class="milky-way back-back">
                <?php for ($i=0; $i<$star_count; $i++) {
                    $top =      randomInvFloat(0,100,$inv_strength);
                    $left =     randomFloat(0,100);
                    $scale =    randomFloat(35,50);
                    UI_RenderRandomStar($top,$left,$scale);
                } ?>
            </div>
        </div>
        <div class="parallax-layer layer-back">
            <div class="milky-way back">
                <?php for ($i=0; $i<$star_count; $i++) {
                    $top =      randomInvFloat(0,100,$inv_strength);
                    $left =     randomFloat(0,100);
                    $scale =    randomFloat(50,65);
                    UI_RenderRandomStar($top,$left,$scale);
                } ?>
            </div>
        </div>
        <div class="parallax-layer layer-base">
            <!-- <div id="card-container" class="card-container" hx-get="/api/get/main-page-content.php" hx-trigger="load"></div> -->
            <div id="card-container" class="card-container"></div>
        </div>
    </div>
</main>

<!-- Set all milky-way to the right height -->
<script>
    function refreshCardList() {
        $.ajax({
        url: '/api/get/main-page-content.php' + window.location.search,
        type: 'GET',
        success: function(response) {
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
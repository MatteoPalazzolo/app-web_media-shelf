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
        <!-- <h1 style="color: var(--color-contrast-agi)">THIS IS A TEST BRRRRRRRRRRRRRRRRRRRRRRRRRRR</h1> -->
        <svg class="ui-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
            <circle style="fill:none;stroke:var(--color-agi);stroke-width:1.3;stroke-miterlimit:10;" cx="16" cy="16" r="11"/>
        </svg>
        <svg class="add-card" xmlns="http://www.w3.org/2000/svg" viewBox="-20.0 -10.0 128.0 120.0" onclick="toggleAddCardMenu();">
            <circle fill="var(--color-agi)" cx="47.5" cy="50" r="60"/>
            <path fill="var(--color-contrast-agi)" d="m81.879 25.984-3.0859-1.043 0.71484-2.1133 3.0859 1.043z"/>
            <path fill="var(--color-contrast-agi)" d="m58.73 3.4609-0.17188-1.6953-37.066 4.0547 3.4023 33.133-9.7891 12.418-0.125 0.1875c-0.10938 0.1875-2.6328 4.6211 0.61328 9.832 0.52344 0.83594 1.3086 1.7969 2.3047 3.0078 4.5352 5.5234 12.82 16.617 9.8984 33.832h3.3945c3.1719-18.68-5.9062-29.977-10.773-35.902-0.88281-1.0781-1.6484-2.0078-2.0547-2.6641-2.0078-3.2227-0.84375-5.9102-0.60547-6.3906l7.6211-9.668 1.9336 18.828 10.969-1.1523c-0.60156 4.8906-1.1875 9.4609-1.1992 9.5391l3.2344 0.41406c0.082032-0.63672 2-15.645 2.4492-20.234 0.19922-2.0156 1.1094-6.6797 5.3359-6.4062 2.6094 0.16406 2.9961 2.9961 3.0469 3.5117v18.566l0.14062 0.31641c7.668 17.16 0.86719 20.773 0.82422 20.793l-0.96875 0.42969v10.02l3.2617 0.003906v-8.0703c0.85547-0.64844 2.0781-1.8867 2.9102-4.0547 1.8438-4.8047 0.86328-11.574-2.9102-20.129v-3.8008l13.492 5.1875 13.281-39.32-3.0859-1.043-12.195 36.102-9.6758-3.7188 8.1484-0.85938-5.2695-51.453 22.859 8.4922-1.3984 4.1406 3.0859 1.043 2.4141-7.1406z"/>
        </svg>
    </header>
    <div class="parallax">
        <?php $inv_strength = 10; ?>
        <div class="parallax-layer layer-back-back-back">
            <div class="milky-way back-back-back">
                <?php for ($i=0; $i<50; $i++) {
                    $top =      randomInvFloat(0,100,$inv_strength);
                    $left =     randomFloat(0,100);
                    $scale =    randomFloat(20,35);
                    UI_RenderRandomStar($top,$left,$scale);
                } ?>
            </div>
        </div>
        <div class="parallax-layer layer-back-back">
            <div class="milky-way back-back">
                <?php for ($i=0; $i<50; $i++) {
                    $top =      randomInvFloat(0,100,$inv_strength);
                    $left =     randomFloat(0,100);
                    $scale =    randomFloat(35,50);
                    UI_RenderRandomStar($top,$left,$scale);
                } ?>
            </div>
        </div>
        <div class="parallax-layer layer-back">
            <div class="milky-way back">
                <?php for ($i=0; $i<50; $i++) {
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
        url: '/api/get/main-page-content.php',
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
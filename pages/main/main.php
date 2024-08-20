<?php
require_once __DIR__ . "/../../utils/utils.php";
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
    <!--
    <header>
        <button class="add-card" onclick="toggleAddCardMenu();"> PUF </button>
        <h1 style="color: var(--color-contrast-agi)">THIS IS A TEST BRRRRRRRRRRRRRRRRRRRRRRRRRRR</h1>
    </header>
    -->
    <div class="parallax">
        <div class="parallax-layer layer-back-back-back">
            <div class="milky-way back-back-back">
                <?php for ($i=0; $i<50; $i++): ?>
                <?php
                    $top =      randomFloat(0,100);
                    $left =     randomFloat(0,100);
                    $scale =    randomFloat(20,35);
                ?>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.66 28.67" style="top: <?= $top ?>%; left: <?= $left ?>%; width: <?= $scale ?>px">
                    <path fill="var(--color-zio)" d="M28.66,14.34A14.33,14.33,0,0,0,14.33,28.67,14.33,14.33,0,0,0,0,14.34,14.34,14.34,0,0,0,14.33,0,14.34,14.34,0,0,0,28.66,14.34Z"/>
                </svg>
                <?php endfor ?>
            </div>
        </div>
        <div class="parallax-layer layer-back-back">
            <div class="milky-way back-back">
                <?php for ($i=0; $i<50; $i++): ?>
                <?php
                    $top =      randomFloat(0,100);
                    $left =     randomFloat(0,100);
                    $scale =    randomFloat(35,50);
                ?>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.66 28.67" style="top: <?= $top ?>%; left: <?= $left ?>%; width: <?= $scale ?>px">
                    <path fill="var(--color-zio)" d="M28.66,14.34A14.33,14.33,0,0,0,14.33,28.67,14.33,14.33,0,0,0,0,14.34,14.34,14.34,0,0,0,14.33,0,14.34,14.34,0,0,0,28.66,14.34Z"/>
                </svg>
                <?php endfor ?>
            </div>
        </div>
        <div class="parallax-layer layer-back">
            <div class="milky-way back">
                <?php for ($i=0; $i<50; $i++): ?>
                <?php
                    $top =      randomFloat(0,100);
                    $left =     randomFloat(0,100);
                    $scale =    randomFloat(50,65);
                ?>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.66 28.67" style="top: <?= $top ?>%; left: <?= $left ?>%; width: <?= $scale ?>px">
                    <path fill="var(--color-zio)" d="M28.66,14.34A14.33,14.33,0,0,0,14.33,28.67,14.33,14.33,0,0,0,0,14.34,14.34,14.34,0,0,0,14.33,0,14.34,14.34,0,0,0,28.66,14.34Z"/>
                </svg>
                <?php endfor ?>
            </div>
        </div>
        <div class="parallax-layer layer-base">
            <div id="card-container" class="card-container" hx-get="/api/get/main-page-content.php" hx-trigger="load"></div>
        </div>
    </div>
</main>

<?php
require_once __DIR__ . "/../../components/new-card-form/form.php";
require_once __DIR__ . "/../../components/refresh-cards/refresh.php";
?>
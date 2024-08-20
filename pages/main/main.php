<style>
<?= file_get_contents("./main.css"); ?>
<?= file_get_contents("./parallax-background.css"); ?>
</style>

<main>
    <header>
        <button class="add-card" onclick="toggleAddCardMenu();"> PUF </button>
        <h1 style="color: var(--color-contrast-agi)">THIS IS A TEST BRRRRRRRRRRRRRRRRRRRRRRRRRRR</h1>
    </header>
    <div class="parallax">
        <div class="parallax-layer layer-back-back-back"    >
            <p style="font-size: 30em;">HELLOOOOOOOOOOOOOOOOOOOOOOOO</p>
        </div>
        <div class="parallax-layer layer-back-back"         >
            <p style="font-size: 40em;">HELLOOOOOOOOOOOOOOOOOOOOOOOO</p>
        </div>
        <div class="parallax-layer layer-back"              >
            <div class="milky-way-back"></div>
            <p style="font-size: 50em;">HELLOOOOOOOOOOOOOOOOOOOOOOOO</p>
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
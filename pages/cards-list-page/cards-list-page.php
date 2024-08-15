<style>
<?= file_get_contents("./cards-list-page.css"); ?>
</style>

<main>
    <header>
        <button onclick="refreshCardsList()"> ADD NEW CARD </button>
    </header>

    <div class="page-background"></div>
    <div id="container" class="container" hx-get="/db/main-page-content.php" hx-trigger="load"></div>
</main>

<?php
require_once __DIR__ . "/../../components/new-card-form/form.php";
require_once __DIR__ . "/../../components/refresh-cards/refresh.php";
?>
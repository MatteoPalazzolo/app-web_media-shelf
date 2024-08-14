<style>
<?= file_get_contents("./cards-list-page.css"); ?>
</style>

<main>
    <div class="page-background"></div>
    <div class="container" hx-get="/db/main-page-content.php" hx-trigger="load"></div>
</main>
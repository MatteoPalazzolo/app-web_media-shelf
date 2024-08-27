<style>
<?= file_get_contents(__DIR__ . "/form.css"); ?>
<?= file_get_contents(__DIR__ . "/layout.css"); ?>
</style>

<?php
define("ADD_IMG_PATH",      "assets/images/img-add.png");
define("BROKEN_IMG_PATH",   "assets/images/img-error.png");
?>

<main id="new-card-form" class="open">
    <div class="backdrop"></div>
    <form class="form open">
        <div class="container">

            <card class="card one right">
                <h1>PALETTE</h1>
            </card>

            <card class="card two center">

                <div id="file-url-input" class="file-url-input" class="submit">
                    <input  class="url-input" type="text">
                    <input  class="hidden-input" type="hidden" name="image_url">
                    <img    class="icon" src="assets/icons/stars.png">
                </div>
            
                <label id="file-input-label" class="file-input-label" for="file-input">
                    <img src="<?= ADD_IMG_PATH ?>"
                         onerror="this.src = this.src === '<?= BROKEN_IMG_PATH ?>' ? undefined : '<?= BROKEN_IMG_PATH ?>';"
                    />
                </label>
                <input id="file-input" name="image" type="file" accept="image/*" style="display: none;" />

                <input class="year" name="year" type="text" inputmode="numeric"
                    maxlength="4" pattern="\d{1,4}" placeholder="1492" required />

                <p class="rating"> ☆☆☆☆☆ </p>

                <input class="title" name="title" type="text" placeholder="Titolo" required />

            </card>

            <card class="card three left">
                <h1>ANNO</h1>
                <h1>TITOLO</h1>
                <h1>TAG</h1>
                <h1>ADD TAG</h1>
                <h1>RATING</h1>
            </card>

        </div>
    </form>
</main>

<script>
    function toggleAddCardMenu() {
        $("#new-card-form").toggleClass("open");
    }
</script>

<script type="module">
    import { setCardToCenter, toggleDeck } from "./<?= substr(__DIR__, 14); ?>/swap-cards.module.js";
    $("#new-card-form .card").on("click", setCardToCenter);
    let meCook = 15;
</script>
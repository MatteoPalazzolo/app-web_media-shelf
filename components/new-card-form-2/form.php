<style>
<?= file_get_contents(__DIR__ . "/css/form.css"); ?>
<?= file_get_contents(__DIR__ . "/css/layout.css"); ?>
<?= file_get_contents(__DIR__ . "/css/fall-from-grace.css"); ?>
</style>

<?php
define("ADD_IMG_PATH",      "assets/images/img-add.png");
define("BROKEN_IMG_PATH",   "assets/images/img-error.png");
?>

<main id="new-card-form" class="">
    <div class="backdrop"></div>
    <form class="form">
        
            <div class="card one right">
                <h1>PALETTE</h1>
            </div>
            
            <div class="card two center">

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

                <div class="back">
                    <img class="icon" onclick="() => alert(1)" src="https://cdn-icons-png.flaticon.com/512/8387/8387055.png">
                </div>

            </div>

            <!--
            <div class="card two center">
                <div class="front">
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

                </div>
                <div class="back">
                    <img class="icon" onclick="() => alert(1)" src="https://cdn-icons-png.flaticon.com/512/8387/8387055.png">
                </div>
            </div>
            -->

            <div class="card three left">
                <h1>ANNO</h1>
                <h1>TITOLO</h1>
                <h1>TAG</h1>
                <h1>ADD TAG</h1>
                <h1>RATING</h1>
            </div>
            
    </form>
</main>

<script type="module">
    import { setCardToCenter, toggleDeck } from "./<?= substr(__DIR__, 14); ?>/modules/swap-cards.module.js";
    import { toggleAddCardMenu } from "./<?= substr(__DIR__, 14); ?>/modules/fall-from-grace.module.js";

    $("#new-card-form .card").on("click", setCardToCenter);

    Object.assign(window , {
        toggleAddCardMenu
    });
</script>
<?php
define("ADD_IMG_PATH",      "assets/images/img-add.png");
define("BROKEN_IMG_PATH",   "assets/images/img-error.png");
include_once "../../assets/php/utils.php";
include_once "../../assets/php/svg.php";
?>

<link rel="stylesheet" type="text/css" href="<?= getLocalDir(__DIR__) . '/css/fix.css' ?>" />
<link rel="stylesheet" type="text/css" href="<?= getLocalDir(__DIR__) . '/css/layout.css' ?>" />
<link rel="stylesheet" type="text/css" href="<?= getLocalDir(__DIR__) . '/css/card-one.css' ?>" />
<link rel="stylesheet" type="text/css" href="<?= getLocalDir(__DIR__) . '/css/animation.css' ?>" />

<style>
#new-card-form {
    --param-card-height: 70%;
}
</style>


<main id="new-card-form" class="down">
    <div class="backdrop"></div>
    <form class="form">
        <div class="container open">

            <div class="card one left">

                <div class="front">
                    <?php UI_FlipIconRight() ?>
                    
                    <h1 class="title">TAGS</h1>
                    <ul class="tag-list">
                        <!--
                        <i># hola</i>
                        <i># persona</i>
                        <i># chirurgo</i>
                        <i># spatola</i>
                        <i># supercalifragilistichespiralidoso</i>
                        <i># roccia</i>
                        -->
                        <i class="add-tag">
                            <p>#</p>
                            <span role="textbox" contenteditable></span>
                        </i>
                    </ul>
                    <div class="ratings">
                        <?php for ($i=0; $i<7; $i++) {
                            UI_EmptyStarSvg2();
                        } ?>
                    </div>

                </div>
                <div class="back">
                    <?php UI_FlipIconLeft() ?>
                    <h1>demo</h1>

                </div>
            </div>

            <div class="card two center">

                <div class="front">
                    <?php UI_FlipIconRight() ?>

                </div>
                <div class="back">
                    <?php UI_FlipIconLeft() ?>    
                    <!-- <img class="icon" onclick="() => alert(1)" src="https://cdn-icons-png.flaticon.com/512/8387/8387055.png"> -->

                </div>
            </div>

            <div class="card three right">
                <div class="front">
                    <?php UI_FlipIconRight() ?>

                    <h1>ANNO</h1>
                    <h1>TITOLO</h1>
                    <h1>TAG</h1>
                    <h1>ADD TAG</h1>
                    <h1>RATING</h1>

                </div>
                <div class="back">
                    <?php UI_FlipIconLeft() ?>

                    <h1>RATING 2</h1>

                </div>
            </div>

        </div>
    </form>
</main>

<script type="module">
    import { 
        setCardToCenter, 
        toggleDeck,
        flipCard
    } from "<?= './' . getLocalDir(__DIR__) . '/modules/swap-cards.module.js' ?>";
    import { 
        toggleAddCardMenu
    } from "<?= './' . getLocalDir(__DIR__) . '/modules/fall-from-grace.module.js' ?>";

    // $(".toggle-card").on("click", toggleDeck);
    $("#new-card-form .card").on("click", setCardToCenter);
    $("#new-card-form .card .flip-icon g").on("click", flipCard);
    
    $("#new-card-form .card.one .front .tag-list .add-tag span").on("keydown", e => {
        if (e.key === 'Enter') {
            e.preventDefault();
            if (e.currentTarget.textContent.length > 0) {
                $("#new-card-form .card.one .front .tag-list .add-tag").before(`<i># ${e.currentTarget.textContent}</i>`);
                e.currentTarget.textContent = "";
            }
        }
        else if (e.currentTarget.textContent.length > 30) {
            e.preventDefault();
        }
    });
    
    Object.assign(window , {
        toggleAddCardMenu
    });
</script>
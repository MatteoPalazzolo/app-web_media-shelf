<?php
define("ADD_IMG_PATH",      "assets/images/img-add.png");
define("BROKEN_IMG_PATH",   "assets/images/img-error.png");
include_once "../../assets/php/utils.php";
include_once "../../assets/php/svg.php";
?>

<?php function UI_YearInput($active=false) { ?>
    <input  class="year" 
            type="text"
            inputmode="numeric"
            maxlength="4"
            pattern="\d{1,4}"
            placeholder="1998"
            <?= $active ? "data-disabled" : ""?>
    >
<?php } ?>

<link rel="stylesheet" type="text/css" href="<?= getLocalDir(__DIR__) . '/css/fix.css' ?>" />
<link rel="stylesheet" type="text/css" href="<?= getLocalDir(__DIR__) . '/css/layout.css' ?>" />
<link rel="stylesheet" type="text/css" href="<?= getLocalDir(__DIR__) . '/css/card-one.css' ?>" />
<link rel="stylesheet" type="text/css" href="<?= getLocalDir(__DIR__) . '/css/card-three.css' ?>" />
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
                    <ul id="tag-list" class="tag-list">
                        
                        <i id="add-tag" class="add-tag">
                            <p>#</p>
                            <span role="textbox" contenteditable></span>
                            <i class="btn-add-tag bi-check" type="button"></i>
                        </i>

                    </ul>
                    <div class="ratings">
                        <?php for ($i=0; $i<7; $i++) {
                            UI_StarSvg();
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
                        
                    <!-- TODO: use a span -->
                    <!-- <textarea class="title" type="text"></textarea> -->
                    <div class="title">
                        <span contenteditable></span>
                    </div>

                    <div class="band back-back">
                        <?= UI_YearInput() ?>
                        <?= UI_YearInput() ?>
                        <?= UI_YearInput() ?>
                        <?= UI_YearInput(true) ?>
                    </div>
                        
                    <div class="band back">
                        <?= UI_YearInput(true) ?>
                        <?= UI_YearInput() ?>
                        <?= UI_YearInput() ?>
                        <?= UI_YearInput(true) ?>
                    </div>

                    <div class="band front">
                        <?= UI_YearInput() ?>
                        <?= UI_YearInput() ?>
                        <?= UI_YearInput(true) ?>
                    </div>

                </div>
                <div class="back">
                    <?php UI_FlipIconLeft() ?>

                    <h1>RATING 2</h1>

                </div>
            </div>

        </div>
    </form>
</main>

<script src="./assets/js/autoresize.jquery.js"></script>
<script type="module">
    import { 
        setCardToCenter, 
        toggleDeck,
        flipCard
    } from "<?= './' . getLocalDir(__DIR__) . '/modules/swap-cards.module.js' ?>";
    import { 
        toggleAddCardMenu
    } from "<?= './' . getLocalDir(__DIR__) . '/modules/fall-from-grace.module.js' ?>";
    import {
        keydownAddTag,
        clickAddTag,
        delTag
    } from "<?= './' . getLocalDir(__DIR__) . '/modules/tags.module.js' ?>";
    import {
        clickSelectRating
    } from "<?= './' . getLocalDir(__DIR__) . '/modules/ratings.module.js' ?>";
    import {
        keydownPreventOverflowingYears,
        keyupUpdateYears
    } from "<?= './' . getLocalDir(__DIR__) . '/modules/year.module.js' ?>";

    // $(".toggle-card").on("click", toggleDeck);
    $("#new-card-form .card").on("click", setCardToCenter);
    $("#new-card-form .card .flip-icon g").on("click", flipCard);
        
    $("#new-card-form .card.one .front .tag-list .add-tag span").on("keydown", keydownAddTag);
    $("#new-card-form #tag-list .btn-add-tag").on("click", clickAddTag);
    $("#new-card-form #tag-list").on("click", ".btn-del-tag", delTag);

    $("#new-card-form .star-icon").on("click", clickSelectRating);
    $("#new-card-form .year").on("keydown", keydownPreventOverflowingYears);
    $("#new-card-form .year").on("keyup", keyupUpdateYears);

    $("#new-card-form .card.three > .front textarea.title").autoResize();
    
    Object.assign(window , {
        toggleAddCardMenu
    });
</script>
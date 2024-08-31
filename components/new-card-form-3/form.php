<?php
define("ADD_IMG_PATH",      "assets/images/img-add.png");
define("BROKEN_IMG_PATH",   "assets/images/img-error.png");
include_once "../../assets/php/utils.php";
?>

<link rel="stylesheet" type="text/css" href="<?= getLocalDir(__DIR__) . '/css/fix.css' ?>" />
<link rel="stylesheet" type="text/css" href="<?= getLocalDir(__DIR__) . '/css/form.css' ?>" />
<link rel="stylesheet" type="text/css" href="<?= getLocalDir(__DIR__) . '/css/layout.css' ?>" />
<link rel="stylesheet" type="text/css" href="<?= getLocalDir(__DIR__) . '/css/card-one.css' ?>" />
<link rel="stylesheet" type="text/css" href="<?= getLocalDir(__DIR__) . '/css/animation.css' ?>" />


<main id="new-card-form" class="down">
    <div class="backdrop"></div>
    <form class="form">
        <div class="container open">

            <div class="card one left">

                <div class="front">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1 1" class="flip-icon">
                        <g><polygon points="0,0 1,0 1,1"/></g>
                    </svg>

                    <h1 class="title">TAGS</h1>
                    <div class="tag-list">
                        <p>#hola</p>
                        <p>#persona</p>
                        <p>#chirurgo</p>
                        <p>#spatola</p>
                        <p>#supercalifragilistichespiralidoso</p>
                        <p>#roccia</p>
                    </div>
                    <div class="ratings">*****</div>

                </div>
                <div class="back">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1 1" class="flip-icon">
                        <g><polygon points="0,0 0,1 1,0"/></g>
                    </svg>
                    <h1>demo</h1>

                </div>
            </div>

            <div class="card two center">

                <div class="front">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1 1" class="flip-icon">
                        <g><polygon points="0,0 1,0 1,1"/></g>
                    </svg>

                </div>
                <div class="back">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1 1" class="flip-icon">
                        <g><polygon points="0,0 0,1 1,0"/></g>
                    </svg>
                    <!-- <img class="icon" onclick="() => alert(1)" src="https://cdn-icons-png.flaticon.com/512/8387/8387055.png"> -->

                </div>
            </div>

            <div class="card three right">
                <div class="front">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1 1" class="flip-icon">
                        <g><polygon points="0,0 1,0 1,1"/></g>
                    </svg>

                    <h1>ANNO</h1>
                    <h1>TITOLO</h1>
                    <h1>TAG</h1>
                    <h1>ADD TAG</h1>
                    <h1>RATING</h1>

                </div>
                <div class="back">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1 1" class="flip-icon">
                        <g><polygon points="0,0 0,1 1,0"/></g>
                    </svg>
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
    } from "./<?= substr(__DIR__, 14); ?>/modules/swap-cards.module.js";
    import { 
        toggleAddCardMenu
    } from "./<?= substr(__DIR__, 14); ?>/modules/fall-from-grace.module.js";
    
    // $(".toggle-card").on("click", toggleDeck);
    $("#new-card-form .card").on("click", setCardToCenter);
    $("#new-card-form .card .flip-icon g").on("click", flipCard);

    Object.assign(window , {
        toggleAddCardMenu
    });
</script>
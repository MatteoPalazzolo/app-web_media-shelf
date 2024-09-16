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
<link rel="stylesheet" type="text/css" href="<?= getLocalDir(__DIR__) . '/css/card-two.css' ?>" />
<link rel="stylesheet" type="text/css" href="<?= getLocalDir(__DIR__) . '/css/card-three.css' ?>" />
<link rel="stylesheet" type="text/css" href="<?= getLocalDir(__DIR__) . '/css/fall-from-grace.css' ?>" />

<style>
#new-card-form {
    --param-card-height: 70%;
}
</style>


<main id="new-card-form" class=""> <!-- .down -->
    <div class="backdrop"></div>
    <form class="form" method="post" action="api/post/submit-card.php">
        <div class="container"> <!-- .open -->

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
                    <img class="media" src="">
                </div>
            </div>

            <div class="card two center">

                <div class="front">
                    <?php UI_FlipIconRight() ?>

                    <label style="cursor: pointer;" id="image-label" for="form-image" class="image-label">
                        <img src="<?= ADD_IMG_PATH ?>" onerror="this.src = this.src === '<?= BROKEN_IMG_PATH ?>' ? undefined : '<?= BROKEN_IMG_PATH ?>';" />
                    </label>
                    <input id="form-image" style="display: none;" name="image" type="file" accept="image/*" />

                    <div id="form-url" class="form-url" class="submit">
                        <input class="url" type="text" />
                        <?php UI_StarButton() ?>
                    </div>

                </div>
                <div class="back">
                    <?php UI_FlipIconLeft() ?>    
                    <img class="media" src="">
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
                    <img class="media" src="">
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
    import {
        keydownAddTag,
        clickAddTag,
        delTag,
        val as formTagsDict
    } from "<?= './' . getLocalDir(__DIR__) . '/modules/form-tags.module.js' ?>";
    import {
        clickSelectRating,
        val as formRatingDict
    } from "<?= './' . getLocalDir(__DIR__) . '/modules/form-rating.module.js' ?>";
    import {
        keydownPreventOverflowingYears,
        keyupUpdateYears
    } from "<?= './' . getLocalDir(__DIR__) . '/modules/form-year.module.js' ?>";
    import {
        val as formImageDict
    } from "<?= './' . getLocalDir(__DIR__) . '/modules/form-image.module.js' ?>";
    import {
        val as formMediaDict
    } from "<?= './' . getLocalDir(__DIR__) . '/modules/form-media.module.js' ?>";

    // $(".toggle-card").on("click", toggleDeck);
    $("#new-card-form .card").on("click", setCardToCenter);
    $("#new-card-form .card .flip-icon g").on("click", flipCard);
        
    $("#new-card-form .card.one .front .tag-list .add-tag span").on("keydown", keydownAddTag);
    $("#new-card-form #tag-list .btn-add-tag").on("click", clickAddTag);
    $("#new-card-form #tag-list").on("click", ".btn-del-tag", delTag);

    $("#new-card-form .star-icon").on("click", clickSelectRating);
    $("#new-card-form .year").on("keydown", keydownPreventOverflowingYears);
    $("#new-card-form .year").on("keyup", keyupUpdateYears);

    $("form.form").on("submit", function(e) {
        e.preventDefault();
        sendForm();
    });
    
    function sendForm() {
        const formData = new FormData();
        /*
        if (formTagsDict.tags.lenght > 0) {
        } else {
            formData.append("tags[]", "");
        }*/

        formTagsDict.tags.forEach(t => formData.append("tags[]", t));
        formData.append("title",        $("#new-card-form .card.three .title > span").text());
        formData.append("year",         $("#new-card-form .card.three .year").val());
        formData.append("type",         "Movie");
        formData.append("color_one",    "#443388");
        formData.append("color_two",    "#880011");
        formData.append("color_three",  "#004499");
        formData.append("rating",       formRatingDict.rating);
        formData.append("image_url",    formImageDict.imageUrl);
        formData.append("image",        formImageDict.imageFile);

        $.ajax({
            type: 'POST',
            url: 'api/post/submit-card.php', 
            data: formData,
            processData: false, // Required for FormData
            contentType: false, // Required for FormData
            success: function(response) {
                console.log(xhr);
                console.log(response);
                var iserror = response.split("\n");
                if (iserror[iserror.length - 1].slice(0,5) === "ERROR") {
                    alert(response);
                } else {
                    // update palette
                    // close form window
                }
            },
            error: function() {
                alert("ERROR: An error occurred while submitting the form.");
            } 
        });
    }
      
    Object.assign(window, {
        toggleAddCardMenu,
        sendForm
    });

</script>

<style>
<?= file_get_contents(__DIR__ . "/card-2.css"); ?>
</style>

<?php require_once __DIR__ . '/../../utils/utils.php'; ?>

<?php function UI_RenderCard2($title, $year, $rating, $img_url, $color_two="#ffa500", $color_three="#fff523", $font="PersonaBold") { ?>
    <div class="card-2">
        <div class="bg-one"></div>
        <div class="bg-two" style="background-color: <?= $color_two ?>;">
            <p style="font-family: <?= $font ?>;">CALENDAR</p>
        </div>
        <div class="bg-three" style="background-color: <?= $color_three ?>;">
            <p style="font-family: <?= $font ?>;">EDIT</p>
        </div>
        <p class="year"><?= $year ?></p>

        <img src="<?= $img_url ?>" alt="">
        <h2 class="title"><?= $title ?></h2>
        <p class="rating"><?= calcStarRating($rating) ?></p>
    </div>
<?php } ?>
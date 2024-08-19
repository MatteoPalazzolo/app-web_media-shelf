<style>
<?= file_get_contents(__DIR__ . "/card.css"); ?>
</style>

<?php require_once __DIR__ . '/../../utils/utils.php'; ?>

<?php function UI_RenderCard2($title, $year, $rating, $img_data, $color_one, $color_two, $color_three) { ?>
    <?php 
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime_type = $finfo->buffer($img_data);
    ?>
    <div class="card" style="--color-one: <?= $color_one ?>">
        <div class="bg-one"></div>
        <div class="bg-two" style="background-color: <?= $color_two ?>;">
            <p>CALENDAR</p>
        </div>
        <div class="bg-three" style="background-color: <?= $color_three ?>;">
            <p>EDIT</p>
        </div>
        <p class="year"><?= $year ?></p>
        <img src="<?= 'data:'. $mime_type . ';base64,' . base64_encode($img_data) ?>" alt="card-image">
        <h2 class="title"><?= $title ?></h2>
        <p class="rating"><?= calcStarRating($rating) ?></p>
    </div>
<?php } ?>

<style>
<?= file_get_contents(__DIR__ . "/card.css"); ?>
</style>

<?php require_once __DIR__ . '/../../utils/utils.php'; ?>

<?php function UI_RenderCard($id, $title, $year, $rating, $color_one, $color_two, $color_three) { ?>
    <div class="card" style="
        --color-local-agi: <?= $color_one ?>;
        --color-local-bufu: <?= $color_two ?>;
        --color-local-zio: <?= $color_three ?>;
        "
        draggable="true" ondragover="event.preventDefault()" ondrop="console.log(event)">
        <div class="bg-one"></div>
        <div class="bg-two" draggable="true">
            <p>CALENDAR</p>
        </div>
        <div class="bg-three" draggable="true">
            <p>EDIT</p>
        </div>
        <p class="year"><?= $year ?></p>
        <img src="api/get/image.php?id=<?= $id ?>" draggable="false">
        <h2 class="title"><?= $title ?></h2>
        <p class="rating"><?= calcStarRating($rating) ?></p>
    </div>
<?php } ?>

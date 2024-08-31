<style>
<?= file_get_contents(__DIR__ . "/card.css"); ?>
</style>

<?php require_once __DIR__ . '/../../assets/php/utils.php'; ?>
<?php require_once __DIR__ . '/../../assets/php/svg.php'; ?>

<?php function UI_RenderCard($id, $title, $year, $rating, $color_one, $color_two, $color_three) { ?>
    <div draggable="true" class="card" style=" --color-local-agi: <?= $color_one ?>; --color-local-bufu: <?= $color_two ?>; --color-local-zio: <?= $color_three ?>; ">
        
        <div class="bg two dashed">
            <p>INFO</p>
        </div>
        <div class="bg three dashed">
            <p>EDIT</p>
        </div>
        <p class="year"><?= $year ?></p>
        <img src="api/get/image.php?id=<?= $id ?>" draggable="false">
        <h2 class="title"><?= $title ?></h2>
        <div class="rating">
            <?php for ($i=0; $i<$rating; $i++) {
                UI_EmptyStarSvg2();
            } ?>
        </div>
    </div>
<?php } ?>

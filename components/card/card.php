<?php 
require_once __DIR__ . '/../../assets/php/utils.php'; 
require_once __DIR__ . '/../../assets/php/svg.php'; 
?>

<link rel="stylesheet" type="text/css" href="<?= getLocalDir(__DIR__) . '/css/stars.css' ?>" />
<link rel="stylesheet" type="text/css" href="<?= getLocalDir(__DIR__) . '/css/card.css' ?>" />

<?php function UI_RenderCard($id, $title, $year, $rating, $color_one, $color_two, $color_three) { ?>
    <div draggable="true" class="card" data-path="<?= $rating === 7 ? "bounce" : "linear" ?>"
        style=" 
        --color-local-agi: <?= $color_one ?>; 
        --color-local-bufu: <?= $color_two ?>; 
        --color-local-zio: <?= $color_three ?>; 
        --stars-number: <?= $rating ?>;
        ">
        
        <div class="bg two dashed">
            <p>INFO</p>
        </div>
        <div class="bg three dashed">
            <p>EDIT</p>
        </div>
        <p class="year"><?= $year ?></p>
        <img src="api/get/image.php?id=<?= $id ?>" draggable="false">
        <h2 class="title"><?= $title ?></h2>
        
        <?php for ($i=0; $i<$rating; $i++): ?>
            <div class="star" style="--star-id: <?= $i ?>">
                <?php UI_StarSvg(); ?>
            </div>
        <?php endfor ?>
    </div>
<?php } ?>

<script type="module" src="./<?= getLocalDir(__DIR__); ?>/modules/drag&drop.module.js"></script>

<?php 
require_once __DIR__ . '/../../assets/php/utils.php'; 
require_once __DIR__ . '/../../assets/php/svg.php'; 
?>

<link rel="stylesheet" type="text/css" href="<?= getLocalDir(__DIR__) . '/css/stars.css' ?>" />
<link rel="stylesheet" type="text/css" href="<?= getLocalDir(__DIR__) . '/css/card.css' ?>" />

<?php function UI_RenderCard($id, $title, $year, $rating, $color_one, $color_two, $color_three) { ?>
    <div draggable="true" class="card" style=" 
        --color-local-agi: <?= $color_one ?>; 
        --color-local-bufu: <?= $color_two ?>; 
        --color-local-zio: <?= $color_three ?>; 
        --count-stars: <?= $rating ?>;
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
        
        <!--
        <div class="rating">
        </div>
        -->

        <?php for ($i=0; $i<$rating; $i++): ?>
            <div class="star" style="--id: <?= $i ?>">
                <?php UI_StarSvg(); ?>
            </div>
        <?php endfor ?>
    </div>
<?php } ?>

<!-- bind drag events to the cards -->
<script type="module">

import {
    startAnimation,
    endAnimation
} from "./<?= getLocalDir(__DIR__); ?>/modules/stars.module.js";

$("#card-container > .card").on("mouseenter", startAnimation);
$("#card-container > .card").on("mouseleave", endAnimation);

$(document).ready(() => {
    let draggedElement = null;
    $('#card-container > .card[draggable="true"]').on('dragstart', e => {
        draggedElement = e.currentTarget;
    })
    $('#card-container > .card[draggable="true"]').on('dragover', e => {
        if (draggedElement !== e.currentTarget)
            e.preventDefault();
    })
    $('#card-container > .card[draggable="true"]').on('drop', e => {
        e.preventDefault();
        if (draggedElement && draggedElement !== e.currentTarget) {
            // Chat GPT, NON HO IDEA DI PERCHÈ FUNZIONI!!
            let temp = document.createElement('div');
            e.currentTarget.before(temp);
            draggedElement.before(e.currentTarget);
            temp.replaceWith(draggedElement);
        }
    })
});
</script>
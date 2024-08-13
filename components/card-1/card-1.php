<script>
$(`<style><?= file_get_contents(__DIR__ . "/card-1.css"); ?></style>`).appendTo("head");
</script>

<?php require_once("../../utils/utils.php"); ?>

<?php function UI_RenderCard1($title, $year, $rating,$img_url) { ?>
    <div class="card-1">
        <div class="bg-one"></div>
        <div class="bg-two"></div>
        <div class="bg-three"></div>
        <p class="year"><?= $year ?></p>

        <img src="<?= $img_url ?>" alt="">
        <h2 class="title"><?= $title ?></h2>
        <p class="rating"><?= calcStarRating($rating) ?></p>
    </div>
<?php } ?>
<script>
$(`<style><?= file_get_contents(__DIR__ . "/card.css"); ?></style>`).appendTo("head");
</script>

<?php function calcStarRating($rating) {
    if ($rating < 0 || $rating > 5) {
        return "invalid number";
    }
    $out = "";
    for ($i = 0; $i < 5; $i++) {
        if ($i < $rating) {
            $out .= "★";
        } else {
            $out .= "☆";
        }
    }
    return $out;
} ?>

<?php function UI_RenderCard($title, $year, $rating,$img_url) { ?>
    <div class="card">
        <div class="bg-one"></div>
        <div class="bg-two"></div>
        <div class="bg-three"></div>
        <p class="year"><?= $year ?></p>

        <img src="<?= $img_url ?>" alt="">
        <h2 class="title"><?= $title ?></h2>
        <p class="rating"><?= calcStarRating($rating) ?></p>
    </div>
<?php } ?>
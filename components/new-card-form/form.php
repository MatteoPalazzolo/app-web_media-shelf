<style>
<?= file_get_contents(__DIR__ . "/form.css"); ?>
</style>

<?php
define("ADD_IMG_PATH",      "assets/images/img-add.png");
define("BROKEN_IMG_PATH",   "assets/images/img-error.jpg'");
?>

<main>
    <form class="form" method="post" action="api/post/add-card.php" enctype="multipart/form-data" style="display: none;">
        <div class="separator"></div>
        <div class="form-card">

            <div class="bg-one"></div>

            <div class="bg-two" style="cursor: auto">
                <p>TAGS</p>
                <label for="input-color-two">
                    <img src="assets/icons/paint-brush-icon.svg" >
                </label>
                <input type="color" id="input-color-two" name="color_two">
            </div>

            <label class="bg-three" for="subimit-form">
                <p>SUBMIT</p>
                <label for="input-color-three">
                    <img src="assets/icons/paint-brush-icon.svg" >
                </label>
                <input type="color" id="input-color-three" name="color_three">
            </label>
            <input style="display: none;" type="submit" id="subimit-form" >

            <input 
                class="year"
                name="year"
                type="text"
                inputmode="numeric"
                maxlength="4"
                pattern="\d{1,4}"
                placeholder="1492"
                required />
            
            <label style="cursor: pointer;" id="image-label" for="image-input">
                <img src="<?= ADD_IMG_PATH ?>"
                     onerror="this.src = this.src === '<?= BROKEN_IMG_PATH ?>' ? undefined : '<?= BROKEN_IMG_PATH ?>';" />
            </label>
            <input 
                id="image-input" 
                style="display: none;" 
                name="image"
                type="file" 
                accept="image/*" />

            <input 
                class="title"
                name="title"
                type="text"
                placeholder="Amogus - The Legent of The SUS"
                required />

            <p class="rating"> ☆☆☆☆☆ </p>

            <div id="input-image-url" class="submit">
                <input name="image_url" type="text">
                <button type="button">GO!</button>
            </div>
        </div>
    </form>
</main>

<script>
function toggleAddCardMenu() {
    $("form.form").toggle();
}

// image file selection
// TODO: load image.png from file -> load image from url -> load image.png from file again
//      => the last wont update because change event is not triggered
$("form.form #image-input").on("change", event => {
    file = event.target.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = e => $("#image-label > img").attr("src", e.target.result);
        reader.readAsDataURL(file);
        setTimeout(updatePalette, 100);
    }
})
// image url selection
$("form.form #input-image-url > button").on("click", () => {
    /*
    var value = $("#input-image-url > input").val();
    if (value) {
        $("#image-label > img").attr("src", value);
        setTimeout(updatePalette, 100);
    }
    */
});
// color thief
function updatePalette() {
    const colorThief = new ColorThief();
    const img = $("#image-label > img")[0];

    var palette = colorThief.getPalette(img, 5);
    var hexPalette = palette.map(e => rgbToHex(e));
    palette.forEach(e => {
        colorConsoleLog(rgbToHex(e), rgbToHex(e));
    });
    $("form.form .bg-two").css("background-color", hexPalette[0]);
    $("form.form .bg-three").css("background-color", hexPalette[1]);
    $("#input-color-two").val(hexPalette[0]);
    $("#input-color-three").val(hexPalette[1]);

    /*
    update = () => {
    }

    if (img.complete) {
        update();
    } else {
        $("#image-label > img").one("load", update);
    }
    */
}

$("form.form #input-color-two").on("change", e => {
    $("form.form .bg-two").css("background-color", e.target.value);
});
$("form.form #input-color-three").on("change", e => {
    $("form.form .bg-three").css("background-color", e.target.value);
});

// form submit
$("form.form").on("submit", function(e) {
    e.preventDefault();
    
    var formData = new FormData(this);
    var data = Object.fromEntries(formData.entries());
    
    if (data.image.name || data.image_url) {
        $.ajax({
            type: 'POST',
            url: 'api/post/add-card.php', 
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var iserror = response.split(/\r?\n/);
                if (iserror[iserror.length - 1].slice(0,5) === "ERROR") {
                    // $('#show-form-error').html(response);
                    alert(response);
                } else {
                    refreshCardsList(
                        $("#input-color-two").val(),
                        $("#input-color-three").val()
                    );
                    toggleAddCardMenu();

                    // reset form
                    $("form.form")[0].reset();
                    $("#image-label > img").attr("src", "<?= ADD_IMG_PATH ?>");
                }
            },
            error: function() {
                // $('#show-form-error').html('<p>Errore nell\'invio del form.</p>');
                alert("ERROR: An error occurred while submitting the form.");
            }
        });
    } else {
        alert("ERROR: No image selected");
    }
});

</script>
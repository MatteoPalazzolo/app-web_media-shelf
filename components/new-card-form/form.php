<style>
<?= file_get_contents(__DIR__ . "/form.css"); ?>
</style>

<?php
define("ADD_IMG_PATH",      "assets/images/img-add.png");
define("BROKEN_IMG_PATH",   "assets/images/img-error.png");
?>

<main>
    <form class="form" method="post" action="api/post/add-card.php" enctype="multipart/form-data" style="display: none;">
        <div class="separator"></div>
        <div class="form-card">

            <div class="bg-one color-picker" style="cursor: auto">
                <p>USELESS LOL</p>
                <label for="input-color-one">
                    <img src="assets/icons/paint-brush-icon.svg" >
                </label>
                <input type="color" id="input-color-one" name="color_one">
            </div>

            <div class="bg-two color-picker" style="cursor: auto">
                <p>TAGS</p>
                <label for="input-color-two">
                    <img src="assets/icons/paint-brush-icon.svg" >
                </label>
                <input type="color" id="input-color-two" name="color_two">
            </div>

            <label class="bg-three color-picker" for="subimit-form">
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
                <input type="text">
                <input type="hidden" name="image_url">
                <img src="assets/icons/stars.png" >
            </div>
        </div>
    </form>
</main>

<script>
// public
function toggleAddCardMenu() {
    if ($("form.form").css("display") === "none") {
        $("form.form").toggle();
        fallFromGrace();
    }
    else if ($("form.form").css("display") === "block") {
        $("form.form").toggle();
        shatterInPieces();
    }
    else {
        console.log("FUCK YOU!!");
    }
}
// private
function fallFromGrace() {
    $(".form-card").addClass("fall");
    $(".form-card").addClass("shine");
    setTimeout(() => {
        $(".form-card").addClass("open");
    }, 1500);
    setTimeout(() => {
        $(".form-card").removeClass("shine");
    }, 1800);
}
// private
function shatterInPieces() {
    // reset animation
    $(".form-card").removeClass("fall");
    $(".form-card").removeClass("open");
    // reset form
    $("form.form")[0].reset();
    $("#image-label > img").attr("src", "<?= ADD_IMG_PATH ?>");
    $("#input-image-url > input[type='text']").val("");
    // remove custom background-color
    $("form.form .bg-one").css("background-color", "");
    $("form.form .bg-two").css("background-color", "");
    $("form.form .bg-three").css("background-color", "");
}

// image file selection
$("form.form #image-input").on("change", event => {
    file = event.target.files[0];
    if (file) {
        $("#input-image-url > input[type='text']").val("");
        $("#input-image-url > input[type='hidden']").val("");
        var reader = new FileReader();
        reader.onload = e => $("#image-label > img").attr("src", e.target.result);
        reader.readAsDataURL(file);
        setTimeout(updatePalette, 100);
    }
})

// image url selection
$("form.form #input-image-url > img").on("click", () => {
    var url = $("#input-image-url > input[type='text']").val();
    if (url) {
        $.ajax({
            type: 'POST',
            url: 'api/post/url-to-base64.php',
            data: { image_url: url },
            success: function(response) {
                var lines = response.split("\n");
                console.log(lines);
                if (lines[lines.length - 1].slice(0,5) === "ERROR") {
                    alert(response);
                } else {
                    $("#image-label > img").attr("src", response);
                    $("#input-image-url > input[type='hidden']").val(url);
                    $("#input-image-url > input[type='text']").val("");
                    $("form.form #image-input").val("");

                    setTimeout(updatePalette, 100);
                }
            },
            error: function() {
                alert("ERROR: An error occurred while submitting the form.");
            }
        });
    }
});

// color thief
function updatePalette() {
    const colorThief = new ColorThief();
    const img = $("#image-label > img")[0];

    var palette = colorThief.getPalette(img, 3);
    var hexPalette = palette.map(e => rgbToHex(e)).sort((a,b) => getColorBrightness(a) - getColorBrightness(b));

    // console log
    palette.forEach(e => {
        colorConsoleLog(rgbToHex(e), rgbToHex(e));
    });

    // update
    $("form.form .bg-one").css("background-color", hexPalette[0]);
    $("form.form .bg-two").css("background-color", hexPalette[1]);
    $("form.form .bg-three").css("background-color", hexPalette[2]);
    $("#input-color-one").val(hexPalette[0]);
    $("#input-color-two").val(hexPalette[1]);
    $("#input-color-three").val(hexPalette[2]);

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

// set root palette 
function setRootPalette(agidyne, bufudyne, ziodyne) {
    console.log("palette set to: ", agidyne, bufudyne, ziodyne);
    $(":root").css("--color-agidyne",  agidyne);
    $(":root").css("--color-bufudyne", bufudyne);
    $(":root").css("--color-ziodyne",  ziodyne);
    $(":root").css("--color-contrast-agidyne",  isColorBright(agidyne)  ? "var(--color-mudo)" : "var(--color-hama)");
    $(":root").css("--color-contrast-bufudyne", isColorBright(bufudyne) ? "var(--color-mudo)" : "var(--color-hama)");
}

// keep color-background updated
$("form.form #input-color-one").on("change", e => {
    $("form.form .bg-one").css("background-color", e.target.value);
});
$("form.form #input-color-two").on("change", e => {
    $("form.form .bg-two").css("background-color", e.target.value);
});
$("form.form #input-color-three").on("change", e => {
    $("form.form .bg-three").css("background-color", e.target.value);
});

// submit form
$("form.form").on("submit", function(e) {
    e.preventDefault();
    
    var formData = new FormData(this);
    var data = Object.fromEntries(formData.entries());
    
    if (data.image.name || data.image_url) {
        $.ajax({
            type: 'POST',
            url: 'api/post/submit-card.php', 
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var iserror = response.split("\n");
                if (iserror[iserror.length - 1].slice(0,5) === "ERROR") {
                    alert(response);
                } else {
                    refreshCardsList(
                        $("#input-color-one").val(),
                        $("#input-color-two").val(),
                        $("#input-color-three").val()
                    );
                    setRootPalette(
                        $("#input-color-one").val(),
                        $("#input-color-two").val(),
                        $("#input-color-three").val()
                    );
                    toggleAddCardMenu();
                }
            },
            error: function() {
                alert("ERROR: An error occurred while submitting the form.");
            }
        });
    } else {
        alert("ERROR: No image selected");
    }
});

</script>
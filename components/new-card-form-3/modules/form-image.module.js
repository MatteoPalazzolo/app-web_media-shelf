const val = {
    imageUrl: "",
    imageFile: undefined
};

// set image by file
$("#new-card-form #form-image").on("change", event => {
    let file = event.target.files[0];
    if (file) {
        $("#new-card-form #form-url > input.url").val("");
        var reader = new FileReader();
        reader.onload = e => $("#new-card-form #image-label > img").attr("src", e.target.result);
        reader.readAsDataURL(file);

        val.imageUrl = "";
        val.imageFile = file;

        // update palette
    }
})

// set image by url
$("#new-card-form #form-url > svg").on("click", () => {
    var url = $("#form-url > .url").val();
    if (url) {
        $.ajax({
            type: 'POST',
            url: 'api/post/url-to-base64.php',
            data: { image_url: url },
            success: function(response) {
                var lines = response.split("\n");
                if (lines[lines.length - 1].slice(0,5) === "ERROR") {
                    alert(response);
                } else {
                    $("#new-card-form #image-label > img").attr("src", response);
                    $("#new-card-form #form-url > .url").val("");
                    $("#new-card-form #form-image").val("");

                    val.imageUrl = url;
                    val.imageFile = undefined;

                    // update palette
                }
            },
            error: function() {
                alert("ERROR: An error occurred while submitting the form.");
            }
        });
    }
});

export {
    val
}
function keydownPreventOverflowingYears(e) {
    if ($(e.currentTarget).attr("data-disabled") === "") {
        e.preventDefault();
    }
}

function keyupUpdateYears(e) {
    $("#new-card-form .year").val(e.currentTarget.value)
}

export {
    keydownPreventOverflowingYears,
    keyupUpdateYears
}
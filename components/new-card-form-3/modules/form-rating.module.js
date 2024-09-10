const val = {
    rating: 1
};

$("#new-card-form .star-icon:nth-child(7)").addClass("check");

function clickSelectRating(e) {
    let all = $("#new-card-form .star-icon");
    let one = e.currentTarget;
    let index = all.toArray().indexOf(one);
    val.rating = 7 - index;

    all.removeClass("check")
    for (var i = index; i < 7; i++) {
        $(all[i]).addClass("check");
    }
}

export {
    val,
    clickSelectRating
}
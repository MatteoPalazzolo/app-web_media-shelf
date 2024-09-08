const FALL_FROM_GRACE_ANIMATION_DURATION = 6 * 1000;

let timeouts = [];

function toggleAddCardMenu() {
    if ($("#new-card-form")[0].classList.contains('down')) {
        shatterInPieces();
    } else {
        fallFromGrace();
    }
}

function fallFromGrace() {
    $("#new-card-form").addClass('down');
    timeouts.push(setTimeout(() => {
        $("#new-card-form .form").addClass('open');
    }, FALL_FROM_GRACE_ANIMATION_DURATION * .8));
}

function shatterInPieces() {
    timeouts.forEach(t => clearTimeout(t));
    timeouts = [];
    $("#new-card-form").removeClass('down');
    $("#new-card-form .form").removeClass('open');
    /* reset center card */
    /* reset palette */
    /* reset form content */
}

export {
    toggleAddCardMenu
}
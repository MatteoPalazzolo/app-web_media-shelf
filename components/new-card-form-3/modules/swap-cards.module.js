
function toggleDeck() {  
    $("#new-card-form .container")[0].classList.contains("open") ? closeDeck() : openDeck();
}

function openDeck() {
    $("#new-card-form .container").addClass("open");
}

function closeDeck() {
    $("#new-card-form .card.center").removeClass("flip");
    $("#new-card-form .container") .removeClass("open");
    $("#new-card-form .card.one")  .removeClass("right center").addClass("left");
    $("#new-card-form .card.two")  .removeClass("left right")  .addClass("center");
    $("#new-card-form .card.three").removeClass("left center") .addClass("right");
}

/* ****************************** */
/* ****************************** */

function setCardToCenter(e) {
    if (!$("#new-card-form .container")[0].classList.contains("open"))
        return;
    if (e.currentTarget.classList.contains("center")) {
        //console.log(e.currentTarget)
        return;
    }
    $("#new-card-form .card.center").removeClass("flip");

    if (e.currentTarget.classList.contains("left")) {
        $("#new-card-form .card.center").removeClass("center").addClass("left");
        $(e.currentTarget).removeClass("left").addClass("center");
    }
    else if (e.currentTarget.classList.contains("right")) {
        $("#new-card-form .card.center").removeClass("center").addClass("right");
        $(e.currentTarget).removeClass("right").addClass("center");
    }
    else {
        console.error("something is not working properly");
    }
}

/* ****************************** */
/* ****************************** */

function flipCard(e) {
    if (!$("#new-card-form .container")[0].classList.contains("open"))
        return;
    let parent = e.currentTarget.parentElement.parentElement.parentElement;
    if (!parent.classList.contains("center")) 
        return;

    $(parent).toggleClass("flip");

    /*
    if (parent.classList.contains("flip")) {
    } else {
    }
    */

    // [x] rimuovi se la carta si sposta dal centro
    // [x] rimuovi se il mazzo viene chiuso
}

/* ****************************** */
/* ****************************** */

export {
    toggleDeck,
    setCardToCenter,
    flipCard
}
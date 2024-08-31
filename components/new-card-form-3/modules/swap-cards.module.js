//TODO: put #new-card-form in front of each query

function toggleDeck() {  
    $(".container")[0].classList.contains("open") ? closeDeck() : openDeck();
}

function openDeck() {
    $(".container").addClass("open");
}

function closeDeck() {
    $(".card.center").removeClass("flip");
    $(".container") .removeClass("open");
    $(".card.one")  .removeClass("right center").addClass("left");
    $(".card.two")  .removeClass("left right")  .addClass("center");
    $(".card.three").removeClass("left center") .addClass("right");
}

/* ****************************** */
/* ****************************** */

function setCardToCenter(e) {
    if (!$(".container")[0].classList.contains("open"))
        return;
    if (e.currentTarget.classList.contains("center")) {
        //console.log(e.currentTarget)
        return;
    }
    $(".card.center").removeClass("flip");

    if (e.currentTarget.classList.contains("left")) {
        $(".card.center").removeClass("center").addClass("left");
        $(e.currentTarget).removeClass("left").addClass("center");
    }
    else if (e.currentTarget.classList.contains("right")) {
        $(".card.center").removeClass("center").addClass("right");
        $(e.currentTarget).removeClass("right").addClass("center");
    }
    else {
        console.error("something is not working properly");
    }
}

/* ****************************** */
/* ****************************** */

function flipCard(e) {
    if (!$(".container")[0].classList.contains("open"))
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
function setCardToCenter(e) {
    if (e.currentTarget.classList.contains("center")) {
    }
    else if (e.currentTarget.classList.contains("left")) {
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

function toggleDeck() {  
    $("#new-card-form .form")[0].classList.contains("open") ? closeDeck() : openDeck();
}

function openDeck() {
    $("#new-card-form .form").addClass("open");
}

function closeDeck() {
    $("#new-card-form .card.one")  .removeClass("right center").addClass("left");
    $("#new-card-form .card.two")  .removeClass("left right")  .addClass("center");
    $("#new-card-form .card.three").removeClass("left center") .addClass("right");
    $("#new-card-form .form")      .removeClass("open");
}

export {
    setCardToCenter,
    toggleDeck
}
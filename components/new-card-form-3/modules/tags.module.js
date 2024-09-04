let tags = [];
const BEARS = [
    "ʕ•ᴥ•ʔ",
    "ʕ·ᴥ·ʔ",
    "ʕ •ᴥ•ʔ",
    "ʕ•ᴥ• ʔ",
    // too high: "ʕっ•ᴥ•ʔっ",
    "ʕ •`ᴥ•´ʔ",
    "ʕ♥ᴥ♥ʔ",
    "ʕᵔᴥᵔʔ",
    // too high: "ʕ◉ᴥ◉ʔ",
    "ʕ´•ᴥ•`ʔ"
]
shuffleBear();

function keydownAddTag(e) {
    let tagName = e.currentTarget.textContent;
    if (e.key === 'Enter') {
        e.preventDefault();
        addTag(tagName);
        e.currentTarget.textContent = "";
    }
    else if (tagName.length > 30) {
        e.preventDefault();
    }
}

function clickAddTag(e) {
    let tagName = $(this).parent().children()[1].textContent;
    addTag(tagName);
    $(this).parent().children()[1].textContent = "";
}

function addTag(tagName) {
    shuffleBear();

    if (!tagName || tagName.length === 0) {
        console.error("ERROR: tag can't be empty.");
        return;
    }

    if (tags.includes(tagName)) {
        console.error("ERROR: two tags with the same name are not allowed.");
        return;
    }

    tags.push(tagName);
    $("#new-card-form .card.one .front .tag-list .add-tag").before(`
        <i>
            <p>#</p>
            <p>${tagName}</p>
            <i class="btn-del-tag bi bi-x" type="button"></i>
        </i>
    `);

}

function delTag() {
    let tagName = $(this).parent().children()[1].innerHTML;

    if (tags.includes(tagName)) {
        tags.splice(tags.indexOf(tagName), 1);
        $(this).parent().remove();
    } else {
        console.error("ERROR: removing an invalid tag.");
    }
}

function shuffleBear() {
    const index = Math.floor(Math.random() * BEARS.length);
    $("#new-card-form .card.one .front .tag-list .add-tag span").attr("data-bear", BEARS[index]);
}

export {
    keydownAddTag,
    clickAddTag,
    delTag
}

class CircularIterator {

    constructor(dict) {
        this.keys = Object.keys(dict);
        this.vals = Object.values(dict);
        this.index = 0;
    }

    first() {
        return [ this.keys[0], this.vals[0] ];
    }

    next() {
        this.index = (this.index + 1) % this.keys.length;
        return [ this.keys[this.index], this.vals[this.index] ];
    }

}

const PATH = "assets/icons/media-type/"
const images = new CircularIterator({
    "TV Series": PATH + "noun-tv.svg",
    "Videogame": PATH + "noun-controller.svg",
    "Movie":     PATH + "noun-film.svg",
    "Book":      PATH + "noun-book.svg",
    "Manga":     PATH + "noun-comic-book.svg",
    "Anime":     PATH + "noun-madara.svg",
});
const val = {
    media: ""
};

const IMAGES_QUERY = "#new-card-form .container .card > .back > img.media";

const [firstKey, firstVal] = images.first();
val.media = firstKey;
$(IMAGES_QUERY).attr("src", firstVal);

$(IMAGES_QUERY).on("click", e => {
    const [nextKey, nextVal] = images.next();
    val.media = nextKey;
    $(IMAGES_QUERY).attr("src", nextVal);
});

export {
    val
}
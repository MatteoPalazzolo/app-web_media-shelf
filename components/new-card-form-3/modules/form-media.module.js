
class CircularIterator {

    constructor(dict) {
        this.dict = dict;
        this.index = 0;
    }

    first() {
        const firstKey = Object.keys(this.dict)[0];
        const firstVal = this.dict[firstKey];
        return [firstKey, firstVal];
    }

    next() {
        this.index = (this.index + 1) % Object.keys(this.dict).length;
        const nextKey = Object.keys(this.dict)[this.index];
        const nextVal = this.dict[nextKey];
        return [nextKey, nextVal];
    }

}

const images = new CircularIterator({
    "CAT1": "https://cdn.britannica.com/36/234736-050-4AC5B6D5/Scottish-fold-cat.jpg",
    "CAT2": "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTnOrOwY43A2IXz1v0yLjmHVWj0d2_YMm_6eA&s",
    "CAT3": "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjSKoyOjhKTNOkbuXv8zhtxMwtpt39UaMmLA&s",
    "CAT4": "https://as1.ftcdn.net/v2/jpg/05/56/12/68/1000_F_556126892_qFRrfRUYWBeZ5ppOlkJl2J380F1rZ0vJ.jpg"
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
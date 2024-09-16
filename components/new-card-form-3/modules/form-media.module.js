
class CircularIterator {

    constructor(list) {
        this.list = list;
        this.index = 0;
    }

    first() {
        return this.list[0];
    }

    next() {
        this.index = (this.index + 1) % this.list.length;
        return this.list[this.index];
    }

}

const images = new CircularIterator([
    "https://cdn.britannica.com/36/234736-050-4AC5B6D5/Scottish-fold-cat.jpg",
    "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTnOrOwY43A2IXz1v0yLjmHVWj0d2_YMm_6eA&s",
    "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjSKoyOjhKTNOkbuXv8zhtxMwtpt39UaMmLA&s",
    "https://as1.ftcdn.net/v2/jpg/05/56/12/68/1000_F_556126892_qFRrfRUYWBeZ5ppOlkJl2J380F1rZ0vJ.jpg"
]);

const val = {
    media: ""
};

const IMAGES_QUERY = "#new-card-form .container .card > .back > img.media";

$(IMAGES_QUERY).attr("src", images.first());
$(IMAGES_QUERY).on("click", e => {
    $(IMAGES_QUERY).attr("src", images.next());
});

export {
    val
}
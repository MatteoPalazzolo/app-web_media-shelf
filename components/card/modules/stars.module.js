const ANIMATION_DURATION = 2000;
const TRIGGER_DELAY = 500;

$("#card-container > .card").toArray().forEach(obj => {
    obj.startTime = 0;
    obj.stars = $(obj).find(".star")
    obj.starDelays = obj.stars.toArray().map(el => parseFloat(getComputedStyle(el).animationDelay) * 1000);
    obj.startGate = true;
    obj.endGate = true;
});

function limitStartAnimation(e) {
    const obj = e.currentTarget;
    
    if (!obj.startGate) return;
    obj.startGate = false;
    setTimeout(() => obj.startGate = true, TRIGGER_DELAY);

    startAnimation(e);
}

function startAnimation(e) {
    const obj = e.currentTarget;
    console.log("START");

    obj.startTime = Date.now();

    obj.stars.addClass("orbit");
}

function limitEndAnimation(e) {
    const obj = e.currentTarget;

    if (!obj.endGate) return;

    let endTime = Date.now();
    let elapsedTime = endTime - obj.startTime;

    if (elapsedTime < TRIGGER_DELAY) {
        obj.endGate = false;
        setTimeout(() => {
            endAnimation(e, TRIGGER_DELAY);
            obj.endGate = true;
        }, TRIGGER_DELAY - elapsedTime);
    } else {
        endAnimation(e, elapsedTime);
    }
}

function endAnimation(e, elapsedTime) {
    const obj = e.currentTarget;
    console.log("END");

    let remainingTime = ANIMATION_DURATION - elapsedTime % ANIMATION_DURATION;
    
    obj.timeouts = obj.starDelays.map((delay, i) => {
        return setTimeout(() => {
            $(e.currentTarget).find(`.star:nth-child(${i+6})`).removeClass("orbit");
        }, remainingTime + delay)
    });
}

export {
    limitStartAnimation as startAnimation,
    limitEndAnimation as endAnimation
}
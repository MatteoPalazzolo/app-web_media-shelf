let draggedElement = null;

$('#card-container > .card[draggable="true"]').on('dragstart', e => {
    draggedElement = e.currentTarget;
})
$('#card-container > .card[draggable="true"]').on('dragover', e => {
    if (draggedElement !== e.currentTarget)
        e.preventDefault();
})
$('#card-container > .card[draggable="true"]').on('drop', e => {
    e.preventDefault();
    if (draggedElement && draggedElement !== e.currentTarget) {
        // FATTO DA Chat GPT, NON HO IDEA DI PERCHÈ FUNZIONI!!
        let temp = document.createElement('div');
        e.currentTarget.before(temp);
        draggedElement.before(e.currentTarget);
        temp.replaceWith(draggedElement);
    }
})

export {
    
}
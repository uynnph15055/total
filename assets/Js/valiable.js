const $  = (slelect) => {
    var elements = document.querySelectorAll(slelect);
    return elements.length == 1 ? elements[0] : elements;
}


function activeSize(id) {
    $('.size-valiable').forEach(item => {
        item.classList.remove('active');
     });
    $('#' + id).classList.add('active');
}



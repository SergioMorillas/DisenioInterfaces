function translateCaja() {
    //Seleciona el primer div con la clase "caja"
    const caja = document.querySelector('.caja');
    //Alterna la clase 'caja-trans' en el div
    caja.classList.toggle('caja-trans');

    const img = document.querySelector('.img');
    img.classList.toggle('img-trans');
}

function rotate2DCaja() {
    //Seleciona el primer div con la clase "caja"
    const caja = document.querySelector('.caja');
    //Alterna la clase 'caja-trans' en el div
    caja.classList.toggle('caja-rot2d');

    const img = document.querySelector('.img');
    img.classList.toggle('img-rot2d');

}

function rotate3DCaja() {
    //Seleciona el primer div con la clase "caja"
    const caja = document.querySelector('.caja');
    //Alterna la clase 'caja-trans' en el div
    caja.classList.toggle('caja-rot3d');

    const img = document.querySelector('.img');
    img.classList.toggle('img-rot3d');

}

function skewCaja() {
    //Seleciona el primer div con la clase "caja"
    const caja = document.querySelector('.caja');
    //Alterna la clase 'caja-trans' en el div
    caja.classList.toggle('skew-rot2d');

    const img = document.querySelector('.img');
    img.classList.toggle('skew-img');

}
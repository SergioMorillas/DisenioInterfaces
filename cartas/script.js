var auxCarta = null;
var aciertos = 0;
var fallos = 0;

function girarCarta(cartaGirada) {
    if (!cartaGirada.classList.contains('girada')) {
        cartaGirada.classList.add('girada');
        setTimeout(comparar, 750, cartaGirada);
    }
}

function comparar(carta2) {

    if (auxCarta == null) {
        auxCarta = carta2;
    }
    else {
        if (auxCarta.id == carta2.id) {
            aciertos++;
        }
        else {
            auxCarta.classList.remove('girada');
            carta2.classList.remove('girada');
            fallos++;
        }
        auxCarta = null;
        console.log("Aciertos: "+aciertos);
        console.log("Fallos: "+fallos);
        cambiasPuntos(aciertos,fallos);
    }

}

var fallosC = document.getElementById("fallos");
var aciertosC = document.getElementById("aciertos");
var fin = document.getElementById("fin");

function cambiasPuntos(aciertos,fallos) {
    aciertosC.innerHTML = aciertos;
    fallosC.innerHTML = fallos;
    if (aciertos== 3){
        fin.innerHTML = "Has ganado!!!";
    }
}
let copos = document.querySelector(".copos")
let musica = document.querySelector("div div audio")

function nevar() {
    copos.classList.add("nieve");
    soundMute()
    setTimeout(() => {
        copos.classList.remove("nieve");
    }, 10000);
}

// Función para alternar el sonido
function soundMute() {
    musica.play()
}

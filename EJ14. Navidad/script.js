// El archivo js...
// Así os ahorro el gran trabajo y sudor que supone crearlo y así Miguel está obligado a no integrarlo en el HTML
let reno= document.getElementById("reno");

let audio = document.querySelector('audio')
let hohoho = document.querySelector('.hohoho')


function elem_visibles() {
    reno.classList.toggle("renosMoviendose")
    hohoho.classList.toggle("hohohoClick");
    if (audio.muted) {
        video.muted = false;  
    } else {
        video.muted = true; 
    }

}
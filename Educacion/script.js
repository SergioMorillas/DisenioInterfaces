let audio = document.getElementById("audio");
let videoPropio = document.getElementById("myVideo");
let externo = document.getElementById("externo");

let pause = document.getElementById("myBtn");
let sound = document.getElementById("soundBtn");
let soundImg = document.getElementById("soundImg");

function myfunction() {
  if (videoPropio.paused) {
    videoPropio.play();
    pause.innerHTML="Pause";
  } else {
    videoPropio.pause();
    pause.innerHTML="Play";
  }
}
function soundMute() {
  if (externo.muted) {
    myVideo.muted = false;
  } else {
    myVideo.muted = true;
  }
}

let player;

// Función llamada cuando la API de YouTube está lista para ser utilizada
function onYouTubeIframeAPIReady() {
  player = new YT.Player("externalVideo",  {
    events: {
      onReady: onPlayerReady,
    },
  });
}

// Función llamada cuando el reproductor está listo
function onPlayerReady(event) {
  sound.addEventListener("click", function () {
    if (externo.isMuted()) {
      externo.unMute();
    } else {
      externo.mute();
    }
  });
}

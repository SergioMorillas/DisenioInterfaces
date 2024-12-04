let cantidad = document.getElementById("numero");
let precio = document.getElementById("precio");

function calcula(opcion) {
  if (opcion == "suma") {
    suma(cantidad.value);
  } else {
    resta(cantidad.value);
  }
}

function suma(cantidadActual) {
  cantidad.value = Number(cantidadActual) + 1;
  cambiarPrecio();
}

function resta(cantidadActual) {
  if (cantidadActual > 1) {
    cantidad.value = cantidadActual - 1;
  }
  cambiarPrecio();
}

function marcar(div) {
  if (div.classList.contains("tamanoClicado")) {
    div.classList.remove("tamanoClicado");
    cambiarPrecio();
    return;
  }

  let elementos = document.getElementsByClassName("tamanoClicado");
  for (let i = 0; i < elementos.length; i++) {
    elementos[i].classList.remove("tamanoClicado");
  }

  div.classList.toggle("tamanoClicado");
  cambiarPrecio();
}

function cambiarPrecio() {
  let precios = {
    "Pequeño": 5,
    "Medio": 8,
    "Grande": 10,
  };

  let tamañoSeleccionado = document.querySelector(".tamanoClicado");
  if (tamañoSeleccionado) {
    let textoTamaño = tamañoSeleccionado.innerText.split("\n")[0];

    let precioBase = precios[textoTamaño];
    let cantidadActual = Number(cantidad.value);
    precio.innerText = Math.round(precioBase * cantidadActual);
  } else {
    precio.innerText = "0";
  }
}

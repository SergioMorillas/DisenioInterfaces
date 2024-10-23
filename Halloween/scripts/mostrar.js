function mostrar(id){
    const apartados = document.querySelectorAll('div[id^="apartado"]');
    apartados.forEach(apartado => {
        apartado.style.display = "none";
    });
    const apartadoSeleccionado = document.getElementById("apartado"+id);
    apartadoSeleccionado.style.display = "block";
}
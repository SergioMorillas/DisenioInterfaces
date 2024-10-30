document.addEventListener('DOMContentLoaded', function()
{
    let confirmacion = confirm("Esta página posee contenido solo apto para adultos, por favor confirma que eres mayor de 18 años")
    if (confirmacion) {
        const element = document.querySelector("#apartado4");
        element.style.filter = 'brightness(1)' ;
    }
    
})
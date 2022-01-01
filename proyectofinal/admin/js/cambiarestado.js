

function cambiarEstado(id, num){
    
    let imagen = id;
    let opcion = num;
    let info = {img: imagen, opt: opcion};
    console.log(imagen);
    console.log(opcion);

    fetch("http://localhost/proyectofinal/admin/cambiarestado.php", {
        method: 'POST',
        mode: "same-origin",
        credentials: "same-origin",
        headers: {
            'Accept': 'application/json, text/plain, */*',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(info)
    })
    .then(response => response.json())
    .then(data => {
        
        if(data === 1){
            console.log("Fotografía aceptada");
        }
        else{
            console.log("Fotografía negada");
        }
            
           console.log(data);
           location.reload();
    });
}

document.addEventListener('DOMContentLoaded', (event) =>{

    console.log("DOM loaded");

});
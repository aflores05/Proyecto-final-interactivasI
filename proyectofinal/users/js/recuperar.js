function generarRandom(){
    return "new" + Math.round(Math.random()*1000);
}

function cambiarContrasenia(){
    
    console.log("change");
    let correo = document.getElementById("email").value;
    let password = generarRandom();
    let email = {email: correo, contrasena: password};

    fetch("http://localhost/proyectofinal/users/recuperar.php", {
        method: 'POST',
        mode: "same-origin",
        credentials: "same-origin",
        headers: {
            'Accept': 'application/json, text/plain, */*',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(email)
    })
    .then(response => response.json())
    .then(data => {
        
        if(data === 401){
            alert("Email incorrecto");
        }
        else{
            alert("Su nueva contraseña es: " + data);
        }
            
           console.log(data);
    });
}

document.addEventListener('DOMContentLoaded', (event) =>{

    console.log("DOM loaded");

    let email = document.getElementById("email");
    email.addEventListener("blur", cambiarContrasenia);

});
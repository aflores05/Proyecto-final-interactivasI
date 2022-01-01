<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Sesion Web</title>
    <link rel="stylesheet" href="css/recuperarContrasena.css">
    <link rel="stylesheet" href="css/hamburgers.css">

</head>
<body>
    
     <img  src="img/logob.webp" alt="seeandshoot" class="img_logo_top">



     <!--Clase Mensaje Bienvenido-->

     <div class="welcome-box">
        <h1>Bienvenidos</h1>

        <form>
            <label for="parrafo">Recupera tu contraseña para concursar con tu mejor fotografía</label>
        </form>
     </div>


     <!--Clase Recuperar Contraseña-->

<div class="login-box">
    
<h1>Recuperar Contraseña </h1>

<form >

    <!--Usuario-->
    <label for="usuario">Correo</label>
    <input type="text" id="email" placeholder="Confirma el correo">
    <p>Recuperar contraseña</p>

       

</form>

</div>




<div class="botonH">
<button class="hamburger hamburger--collapse" type="button" onclick="menu()">
    <span class="hamburger-box" >
      <span class="hamburger-inner" ></span>
    </span>
  </button>


        <!-- menu hamburguesa -->
        <section>
            <div class="botonH">
                <button class="hamburger hamburger--collapse" type="button" onclick="menu()">
                    <span class="hamburger-box" >
                      <span class="hamburger-inner" ></span>
                    </span>
                  </button>
                
                  <div class="menu">
                    <ul>
                      <li>
                        <input type="button" value="Inicio" onclick="location.href='./index.html'" class="boton"> 
                      </li>
                      
                      <li>
                        <input type="button" value="Inicio Sesion" onclick="location.href='./iniciosesion.php'" class="boton" > 
                      </li>

                      <li>
                        <input type="button" value="Registro" onclick="location.href='./registro.php'" class="boton" > 
                      </li>

                      <li>
                        <input type="button" value="Recuperar contrasena" onclick="location.href='./recuperarContrasena.php'" class="boton">  
                      </li>
                      
                      <li>
                        <input type="button" value="Perfil" onclick="location.href='./profile.php'" class="boton" >   
                      </li>
                
                      <li>
                        <input type="button" value="Galeria" onclick="location.href='./categorias.html'" class="boton">  
                      </li>

                      <li>
                        <input type="button" value="Subir imagen" onclick="location.href='./upload.php'" class="boton">  
                      </li>

                      <li>
                        <input type="button" value="Lista Participantes" onclick="location.href='./lista_participantes.php'" class="boton">  
                      </li>

                      <li>
                        <input type="button" value="Log out" onclick="location.href='./logout.php'" class="boton">  
                      </li>
                    </ul>
                  </div>
                </div>
                </section>
         <!-- menu hamburguesa -->


<script src="js/menu.js"></script>
<script src="js/recuperar.js"></script>


</body>
</html>
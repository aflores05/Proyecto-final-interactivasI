<?php
   namespace Medoo;
   require "Medoo.php";

   use \Datetime;
   
   $database = new Medoo([
       "database_type" => "mysql",
       "database_name" => "see_y_shoot",
       "server" => "localhost",
       "username" => "root",
       "password" => "root"
   ]);

    date_default_timezone_set("America/Costa_Rica");
    $date_time = date("Y-m-d H:i:s");

    if($_POST){
      $user = $database->select("tb_users", "*",[
        "username" => $_POST["username"]]);
        $user_password = $database->select("tb_users", "*", ["username[=]" => $_POST["username"], "password[=]" => $_POST["password"]]);

        if(count($user) > 0){
            //if(password_verify($_POST["password"], $user[0]["password"])){
              if(empty($user_password)){
                echo "usuario o contraseña incorrecto";
              }
              else{
                
                $database->update("tb_users", [
                    "last_login_at" => $date_time
                ],[
                    "id_user" => $user[0]["id_user"]
                ]);

                //iniciar sesion
                session_start();
                $_SESSION["isLoggedIn"] = true;
                $_SESSION["username"] = $user[0]["username"];
                $_SESSION["id_user"] = $user[0]["id_user"];
                //
                header("location:profile.php");
            }
          }
                
      }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Sesion Web</title>
    <link rel="stylesheet" href="css/inicioSesion.css">
    <link rel="stylesheet" href="css/hamburgers.css">

</head>
<body>
    
     <img  src="img/logob.webp" alt="seeandshoot" class="img_logo_top">



     <!--Clase Mensaje Bienvenido-->

     <div class="welcome-box">
        <h1>Bienvenidos</h1>

        <form>
            <label for="parrafo">Inicia sesión para concursar con tu mejor fotografía</label>
        </form>
     </div>


     <!--Clase Inicio de Sesion-->

<div class="login-box">
    
<h1>Inicio Sesion</h1>

<form action="inicioSesion.php" method="post">

    <!--Usuario-->
    <label for="usuario">Nombre de usuario</label>
    <input type="text" name="username" placeholder="Ingresa el usuario" >



        <!--Contrasena-->
        <label for="contrasena">Contraseña</label>
        <input type="password" name="password" placeholder="Ingresa la contraseña" >

        <!--Olvido la Contrasena-->
        <a href="./recuperarContrasena.php" target="_self">Olvidaste la Contraseña?</a>
        <a class="textos" href="./recuperarContrasena.php" target="_self">Recuperar Contraseña</a1>

         <!--Pasar a registro-->
        <a class="textos" href="./registro.php" target="_self">No tienes cuenta?</a>

        <!--Aceptar y Continuar-->
        <input type="submit" value="Continuar">

       

</form>

</div>
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
                        <input type="button" value="Lista Participantes"onclick="location.href='./lista_participantes.php'" class="boton">  
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


</body>
</html>
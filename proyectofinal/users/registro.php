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

    //$pass = password_hash($_POST["password"], PASSWORD_DEFAULT);
    date_default_timezone_set("America/Costa_Rica");
    $date_time = date("Y-m-d H:i:s");

    if($_POST){
        $username = $database->select("tb_users", "*", ["username[=]" => $_POST["username"]]);
        $user_email = $database->select("tb_users", "*", ["user_email[=]" => $_POST["user_email"]]);

        if(empty($username) and empty($user_email)){
            $database->insert("tb_users", [
                "username" => $_POST["username"],
                "password" => $_POST["password"],
                "user_email" => $_POST["user_email"],
                "name" => $_POST["name"],
                "lastname" => $_POST["lastname"],
                "registered_at" => $date_time
            ]);
            header("location:inicioSesion.php");
        }
        else{
            if(!empty($username) and !empty($user_email)){
                echo "El usuario y el email ya se encuentran en uso";
            }
            else{
                if(!empty($username)){
                echo "El usuario ya se encuentra en uso";
                }
                if(!empty($user_email)){
                echo "El email ya se encuentra en uso";
                }
            }
        }
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Sesion</title>
    <link rel="stylesheet" href="css/registro.css">
    <link rel="stylesheet" href="css/hamburgers.css">
</head>
<body>
    
     <img  src="img/logob.webp" alt="seeandshoot">
     

     <div class="welcome-box">
        <h1>Bienvenidos</h1>

        <form>
            <label for="parrafo">Registrate para concursar con tu mejor fotografía</label>
        </form>
     </div>


<div class="registro-box">
    
<h1>Registro </h1>

<form form action="registro.php" method="post" enctype="multipart/form-data">

    <!--Usuario-->
    <label for="usuario">Nombre de Usuario</label>
    <input type="text" name="username" placeholder="Ingrese el nombre de usuario">



        <!--Contrasena-->
        <label for="contrasena">Contraseña</label>
        <input type="password" name="password" placeholder="Ingrese la contraseña" required>

        <label for="correo">Correo Electronico</label>
        <input type="text" name="user_email" placeholder="Ingrese el correo electronico" required>

        <label for="name">Nombre</label>
        <input type="text" name="name" placeholder="Ingrese el nombre" required>

        <label for="lastname">Apellido</label>
        <input type="text" name="lastname" placeholder="Ingrese el apellido" required>

        <input type="submit" value="Continuar">



</form>

</div>

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
                        <input type="button" value="Recuperar contrasena" onclick="location.href='./recuperarContrasena.php'" class="boton">  
                      </li>

                      <li>
                        <input type="button" value="Log out" onclick="location.href='./lista_participantes.php'" class="boton">  
                      </li>
                
                      <li>
                        <input type="button" value="Galeria" onclick="location.href='./categorias.html'" class="boton">  
                      </li>
                    </ul>
                  </div>
                </div>
                </section>
         <!-- menu hamburguesa -->


  <script src="js/menu.js"></script>




</body>
</html>
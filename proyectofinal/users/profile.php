<?php

namespace Medoo;
require "Medoo.php";


session_start();
if(isset($_SESSION["isLoggedIn"])){ 
  $database = new Medoo([
      "database_type" => "mysql",
      "database_name" => "see_y_shoot",
      "server" => "localhost",
      "username" => "root",
      "password" => "root"
  ]);


  $data = $database->select("tb_photo", "*",[
      "id_user" => $_SESSION["id_user"]
  ],[
      "image", "photo_name", 	"photo_status"
  ]);

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/hamburgers.css">

    <title>Perfil</title>
</head>
<body>
    <!--Parte de arribaw-->
       <!-- header -->
       <header>
        <nav class="top-bar">
            <a class="logo" href="#">
                <img class="logo-resize" src="./img/logo1.webp" alt="Logo">
            </a>
        </nav>


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
                        <input type="button" value="Log out" onclick="location.href='./logout.php'" class="boton">  
                      </li>
                    </ul>
                  </div>
                </div>
                </section>
         <!-- menu hamburguesa -->

    </header>

    <section>
    <div class="background-profile">

        <img class="profile-pic" src="img/profile-pic.webp" alt="seeandshoot">

    </div>
    </section>

    <!--Informacion perfil-->
    <section>
    <div>
      
        <div class="profile-name"> <?php echo $_SESSION["username"];?>  </div> 

    </div>
    </section>

    <!--Partes perfil-->
    <section>
    <div>
        <hr id="hr1">
        <ul class="profile-sections">
        <li class="profile-parts"><a class="Text-link" href="#">Top 10</a></li>
        <li class="profile-parts"><a class="Text-link" href="#">Fotos</a></li>
        <li class="profile-parts"><a class="Text-link" href="#">Album</a></li>
        <li class="profile-parts"><a class="Text-link" href="#">Informacion</a></li>
        </ul>
        
    </div>
    </section>

    <!-- pictures -->
    <section class="pictures">

        <div class="fotos">

            <ul class="row">

            <?php
            $len = count($data);
            for($i=0; $i<$len; $i++){
                echo"<li class='col'>";
                echo"<div class='container-photo'>";
                echo"<img class='photo' src='./images/".$data[$i]["image"]."'>";
                echo"<p class='info'> Nombre: ".$data[$i]["photo_name"]."</p>";
                echo"<p class='info'> Estado: ".$data[$i]["photo_status"]."</p>";
                echo"</div>";
                echo"</li>";
            }
            ?>

            </ul>

        </div>

    </section>

    <!-- pictures -->

       <!-- footer -->
       <footer>
            <hr id="hr2">
            <nav>
                <ul class="text-nav">
                    <li class="bottom-nav-text"><a class="footer-link" href="#">INFORMACION</a></li>
                    <li class="bottom-nav-text"><a class="footer-link" href="#">CONTACTENOS</a></li>
                    <li class="bottom-nav-text"><a class="footer-link" href="#">PRIVACIDAD</i></a></li>
                </ul>
            </nav>

            <nav >
                <ul class="bottom-nav">
                    <li class="bottom-nav-item"><a class="footer-link" href="#"><i class="fab fa-twitter"></i></a></li>
                    <li class="bottom-nav-item"><a class="footer-link" href="#"><i class="fab fa-instagram"></i></a></li>
                    <li class="bottom-nav-item"><a class="footer-link" href="#"><i class="fab fa-facebook-f"></i></a></li>
                </ul>
            </nav>
    </footer>
    <!-- footer -->
    
    <script src="js/menu.js"></script>

</body>
</html>
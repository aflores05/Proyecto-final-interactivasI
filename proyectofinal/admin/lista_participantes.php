<?php

namespace Medoo;
require "Medoo.php";



  $database = new Medoo([
      "database_type" => "mysql",
      "database_name" => "see_y_shoot",
      "server" => "localhost",
      "username" => "root",
      "password" => "root"
  ]);


  $data = $database-> select("tb_users", "*");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="css/lista_participantes.css">
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
                        <input type="button" value="Lista de fotografías" onclick="location.href='./lista_fotografias.php'" class="boton"> 
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

    <!-- lista -->
    <section class="pictures">

        <div class="fotos">

            <ul class="row">

            <?php
            $len = count($data);
            for($i=0; $i<$len; $i++){
                echo"<li class='col'>";
                echo"<div class='container-photo'>";
                echo"<p class='info'> Nombre de usuario: ".$data[$i]["username"]."</p>";
                echo"<p class='info'> Nombre: ".$data[$i]["name"]."</p>";
                echo"<p class='info'> Apellidos: ".$data[$i]["lastname"]."</p>";
                echo"<p class='info'> Email: ".$data[$i]["user_email"]."</p>";
                echo"</div>";
                echo"</li>";
            }
            ?>

            </ul>

        </div>

    </section>

    <!-- lista -->

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
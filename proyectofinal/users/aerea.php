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


  $data = $database->select("tb_photo","*",
  ["photo_status" => "aprobado","photo_category" => "Aerea"],
  [
    "image", "photo_name"
  ]);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="css/aerea.css">
    <link rel="stylesheet" href="css/hamburgers.css">

    <title>SEE & SHOOT</title>
</head>
<body>

    <!-- header -->
    <header>
        <nav class="top-bar">

            <a class="logo" href="#">
                <img class="logo-resize" src="./img/logo1.webp" alt="Logo">
            </a>

           
        </nav>
        <section>
            <h1 class="intro-title">Aerea</h1>
        </section>


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
    <!-- header -->
    
    <!-- pictures -->
    <section class="pictures">

        <div class="fotos">

            <ul class="row">
            
            <?php
            $len = count($data);
            for($i=0; $i<$len; $i++){

                //cantidad de votos/likes de un libro
                $count = $database->count("tb_user_likes_photo", [
	                "id_photo" => $data[$i]["id_photo"]
                ]);
                
                $hasVoted = [];

                //libros por los que ha votado un usuario
                if(isset($_SESSION["isLoggedIn"])){
                    $hasVoted = $database->select("tb_user_likes_photo", "*", [
                        "AND" =>[
                            "id_user" =>  $_SESSION["id"],
                            "id_photo" => $data[$i]["id_photo"]
                        ]
                    ]);
                }

                //var_dump($hasVoted);
                //si ha votado, se cambio al icono con relleno y no se agrega la funcion de JS para votar
                if(count($hasVoted) > 0){
                    $style = "fas fa-heart";
                    $click = "";
                }else{
                    $style = "vote-icon far fa-heart";
                    $click = "onclick='voting(".$data[$i]["id_photo"].")'";
                }
                //echo "<div class='col col-2'><img class='img-gallery' src='./images/".$data[$i]["image"]."'><p class='votes'><i id='".$data[$i]["id_photo"]."' class='".$style."' ".$click." ></i></p><p class='votes'>Likes: <span id='v".$data[$i]["id_photo"]."'>".$count."</span></p></div>";
                echo"<li class='col'>";
                echo"<div class='container-photo'>";
                echo"<img class='photo' src='./images/".$data[$i]["image"]."'>";
                echo"<p class='info'>".$data[$i]["photo_name"]."</p>";
                echo"<p ".$click." class = '".$style."' class='info'></p>";
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
            <hr>
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
    <script src="js/js.js"></script>

</body>
</html>
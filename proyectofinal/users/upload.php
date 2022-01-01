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

    date_default_timezone_set("America/Costa_Rica");
    $date_time = date("Y-m-d H:i:s");


    if(isset($_FILES["image"])){

        $errors = array();
        $file_name = $_FILES["image"]["name"];
        $file_size = $_FILES["image"]["size"];
        $file_tmp = $_FILES["image"]["tmp_name"];
        $file_type = $_FILES["image"]["type"];
        $file_ext_arr = explode(".", $_FILES["image"]["name"]);

        $file_ext = end($file_ext_arr);
        $img_ext = array("jpeg", "jpg", "png");

        if(in_array($file_ext, $img_ext) === false) $errors[] = "Choose a JPEG or PNG file";

        if($file_size > 2097152) $errors[] = "2MB Max";

        if(empty($errors)){
           
            $img = generateRandomString().".".pathinfo($file_name, PATHINFO_EXTENSION);
            move_uploaded_file($file_tmp, "images/".$img);
    
        }else{
            print_r($errors);
        }

    }

    if($_POST){
        $database->insert("tb_photo", [
            "photo_name" => $_POST["photo_name"],
            "photo_description" => $_POST["photo_description"],
            "id_user" => $_SESSION["id_user"],
            "photo_category" => $_POST["photo_category"],
            "photo_status" => "pendiente",
            "submit_at" => $date_time,
            "approved_at" => "",
            "image" => $img
        ]);

        header("location:upload.php");
    }

    }//fin if grandote

    function generateRandomString(){
        $string = str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ");
        return substr($string, 20);
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="css/upload.css">
    <link rel="stylesheet" href="css/hamburgers.css">
    <title>Upload</title>
</head>
<body>
        <!--Parte de arribaw-->
        <header>

            <a href="index.html"><img class="logo-up" src="img/logo.webp" alt="seeandshoot"></a>
            

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

        <!--            medio          -->
        <div class="center">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <div class="upload-area">
                    <a class="img-icon" href="#"><i class="far fa-image"></i></a>
                </div>

            <!--            rellernar informacion          -->

            <ul class="information">
                    <li>
                    <input class="text-area" type="text" name="photo_name" placeholder="Nombre" required>
                    <input  class="text-area" type="text" name="photo_description" placeholder="Descripcion" required>
                    </li>

                    <li class="text-area" id="categori_select" required>
                    <select name="photo_category" class="input-field">
                        <option value="categoria">Categoria</option>
                        <option value="aerea">Aerea</option>
                        <option value="personas">Personas</option>
                        <option value="naturaleza">Naturaleza</option>
                        <option value="paisajes">Paisajes</option>
                    </select>
                    </li>

                    
                    <li class="upload-zone">
                    <input id="upload" type="file" name="image" accept="image/png, image/jpeg" required>
                    <img id="preview" src="" alt="" style="object-fit: contain; width: 100%; height: 189px;">
                    </li>

                    </li>
                    <input class="btn" type="submit" value="Enviar magen">
                    </li>

            </ul>

            </form>
        </div>   <!--            fin medio          -->

        
         <!-- menu hamburguesa -->

    <!--            Footer          -->
    <footer>
        <ul class="footer-text">
        <li class="text-Footer"><a class="link-footer" href="#">Informacion |</a></li>
        <li class="text-Footer"><a class="link-footer" href="#">Contactenos |</a></li>
        <li class="text-Footer"><a class="link-footer" href="#">Privacidad</a></li>
        </ul>

        <a href="#"><img class="logo-down" src="img/logo.webp" alt="seeandshoot"></a>

            <ul class="button-social-media">
            <li class="bottom-nav-item"><a class="footer-social-media" href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li class="bottom-nav-item"><a class="footer-social-media" href="#"><i class="fab fa-twitter"></i></a></li>
            <li class="bottom-nav-item"><a class="footer-social-media" href="#"><i class="fab fa-instagram"></i></a></li>
            </ul>
    </footer>

    <script src="js/menu.js"></script>


</body>
</html>
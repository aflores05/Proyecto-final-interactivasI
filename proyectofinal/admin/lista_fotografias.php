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

        $data = $database->select("tb_photo", "*", ["photo_status" => "pendiente"]);

    }else{
        //redirect
        //header("location:login.php");
    }
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de fotografías</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>


    
    <div class="container">
        <h1>Fotografías</h1>
        <h3>Hi <?php echo $_SESSION["usr"]; ?> <a href="logout.php">Logout</a></h3>
        <div class="row">
            <div class="col col-2 title-gallery">Imagen</div>
            <div class="col col-2 title-gallery">Nombre</div>
            <div class="col col-2 title-gallery">Descripcion</div>
            <div class="col col-2 title-gallery">Categoria</div>
            <div class="col col-2 title-gallery">Opciones</div>

        </div>
        <?php
            $len = count($data);
            for($i=0; $i<$len; $i++){
                echo "<div class='row'>";
                echo "<div class='col col-2'><img class='img-gallery' src='../users/images/".$data[$i]["image"]."'></div>";
                echo "<div class='col col-2'>".$data[$i]["photo_name"]."</div>";
                echo "<div class='col col-2'>".$data[$i]["photo_description"]."</div>";
                echo "<div class='col col-2'>".$data[$i]["photo_category"]."</div>";
                echo "<div class='col col-2'><p onclick = 'cambiarEstado(".$data[$i]["id_photo"].", 1)'>Aceptar</p><p onclick = 'cambiarEstado(".$data[$i]["id_photo"].", 2)'>Negar</p></div>";
                echo "</div>";
            }
        ?>
    </div>

    <script src="js/cambiarestado.js"></script>
</body>
</html>
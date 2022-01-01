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

    if(isset($_SERVER["CONTENT_TYPE"])){

        $contentType = $_SERVER["CONTENT_TYPE"];

        if ($contentType === "application/json") {

            $content = trim(file_get_contents("php://input"));
        
            $decoded = json_decode($content, true);

            if($decoded["opt"] === 1){
                $database->update("tb_photo", [
                    "photo_status" => "aprobado"
                ],[
                    "id_photo" => $decoded["img"]
                ]);
                echo json_encode(1);
            }
            else{
                $database->update("tb_photo", [
                    "photo_status" => "negada"
                ],[
                    "id_photo" => $decoded["img"]
                ]);
                echo json_encode(2);
            }

        }   
    }   
    

?>
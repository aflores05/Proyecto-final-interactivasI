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

   session_start();

   if(isset($_SESSION["isLoggedIn"])){
        if(isset($_SERVER["CONTENT_TYPE"])){

            $contentType = $_SERVER["CONTENT_TYPE"];

            if ($contentType === "application/json") {

                $content = trim(file_get_contents("php://input"));
            
                $decoded = json_decode($content, true);
            
                //echo json_encode($decoded["user"]);
            
                
                $database->insert("tb_user_likes_photo", [
                    "id_user" => $_SESSION["id_user"],
                    "id_photo" => $decoded["id_photo"]
                ]);

                echo json_encode(200);

            }
        } 

    }else{
        echo json_encode(401);
    }
 
?>
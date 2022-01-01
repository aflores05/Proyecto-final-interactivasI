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
        
            $email = $database->select("tb_users", "*", ["user_email[=]"=>$decoded["email"]]);

            if(count($email) > 0){
                echo json_encode($decoded["contrasena"]);
                $database->update("tb_users", [
                    "password" => $decoded["contrasena"]
                ],[
                    "user_email" => $decoded["email"]
                ]);
            }
            else{
                echo json_encode(401);
            }
            
        }
        
    }
    

?>
<?php

    require'common.php';
    $obj = new Common;

    if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
            
        if($name && $email && $password){

        $res = $obj->insertData($name,$email,$password);
                
            $data = $obj->cheakStatus($res, "Insert");
                
        } else {
            $data = $obj->validation(name:$name,email :$email,password:$password,isField:0);
        }
    } else {
        $data = $obj->validation(name:isset($_POST["name"]),email :isset($_POST["email"]),password:isset($_POST["password"]),isField:1);
    }

    echo json_encode($data);
    
 ?>
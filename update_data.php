<?php

    require'common.php';
    $obj = new Common;

    if(isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"])){
        $id = $_POST["id"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
    
        if($id && $name && $email && $password ){
    
            $res = $obj->updateData($id, $name,$email,$password);
            
            $data = $obj->cheakStatus($res, "Update");
    
        } else {
            $data = $obj->validation(id : $id,name:$name,email :$email,password:$password,isField:0);
        } 
    } else {
        $data = $obj->validation(id:isset($_POST["id"]) , name:isset($_POST["name"]),email :isset($_POST["email"]),password:isset($_POST["password"]),isField:1);
    }
    
    echo json_encode($data);
    
 ?>
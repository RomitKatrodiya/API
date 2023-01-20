<?php

    require'common.php';
    $obj = new Common;

    if(isset($_POST["id"])){
        $id = $_POST["id"];
    
        if($id){
    
            $res = $obj->deleteData($id);
            
            $data = $obj->cheakStatus($res, "Delete");
    
        } else {
            $data = $obj->validation(id:$id,isField:0);
        } 
    } else {
        $data = $obj->validation(id:isset($_POST["id"]) ,isField:1);
    }

    echo json_encode($data);
    
 ?>
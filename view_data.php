<?php
        
    require'common.php';
    $obj = new Common;

    $data = $obj->viewData();

    echo json_encode($data);
    
 ?>
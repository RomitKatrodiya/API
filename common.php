<?php

    class Common{
        public $con;

        function __construct()
        {
            $this->con = mysqli_connect("localhost","root","","api");
        }

        public function insertData($name, $email, $password){
            $qu = mysqli_query($this->con,"INSERT INTO `user`(`name`, `email`, `password`) VALUES ('$name','$email','$password')");
            return $qu;
        }

        public function updateData($id, $name, $email, $password)
        {   
            $qu = mysqli_query($this->con,"UPDATE `user` SET `name`='$name',`email`='$email',`password`='$password' WHERE `id` = '$id'");
            return $qu;  
        }    

        public function deleteData($id)
        {   
            $qu = mysqli_query($this->con,"DELETE FROM `user` WHERE `id` = $id");
            return $qu;  
        } 

        public function viewData()
        {   
            $qu = mysqli_query($this->con,"SELECT * FROM `user`");

            $alldata = array();

            while($row = mysqli_fetch_array($qu)){
                $data["id"] = $row["id"];
                $data["name"] = $row["name"];
                $data["email"] = $row["email"];
                $data["password"] = $row["password"];
                $alldata[] = $data;
            }
            return $alldata;  
        } 

        public function cheakStatus($res, $opretionName)
        {
            if($res){
                $data["status"] = "$res"; 
                $data["message"] = "User $opretionName Successful...";
            } else {
                $data["status"] = "$res"; 
                $data["message"] = "!!! User $opretionName Failed !!!";    
            }

            return $data;
        }

        public function validation($id = "id",$name = "name", $email = "email", $password = "password", $isField)
        {
            $data["status"] = 0; 
            $data["message"] = ($isField == 0)? "Enter required Values":"Enter required Field"; 

            if($id == "" && $id != "id"){
                $data["error"][] = ($isField == 0)?"!!! Please Enter ID First !!!" : "!!! Add id Field !!!";
            }

            if($name == "" && $name != "name"){
                $data["error"][] = ($isField == 0)?"!!! Please Enter Name First !!!": "!!! Add name Field !!!";
            }

            if($email == "" && $email != "email"){
                $data["error"][] = ($isField == 0)?"!!! Please Enter Email First !!!": "!!! Add email Field !!!";
            }

            if($password == "" && $password != "password"){
                $data["error"][] = ($isField == 0)?"!!! Please Enter Password First !!!": "!!! Add password Field !!!";
            }

           return $data;
        } 
    }

?>
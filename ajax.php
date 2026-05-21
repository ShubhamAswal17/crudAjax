<?php
include "connection.php";
  if(isset($_POST["formdata"])){
        $name=$_POST["name"];
        $email=$_POST["email"];
        $clean_password=$_POST["password"];
        $address=$_POST["address"];
        $status=$_POST["status"];
       if(empty($name) || empty($email) || empty($address) || empty($status) || empty($clean_password)){
            echo " is empty";
        }
        else{
            $password = md5($clean_password);
            $qry="INSERT INTO user (name,email,password,address,status) VALUES ('$name','$email','$password','$address','$status')";
            $result=mysqli_query($connect,$qry);
            if($result>0){     
             
                echo json_encode(['status' => 'true', 'message' => $name]);                                   
            }else{
                echo json_encode(array("status"=>"false", "message"=>"data insertion failed"    ));
            }
           
        }
  }
?>
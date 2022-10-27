<?php
include '../config/config.php';

$method=$_SERVER['REQUEST_METHOD'];

switch($method){
    case 'POST': 
        $user = json_decode(file_get_contents('php://input'));
        //  print_r($user);
        //  print_r($user->params);
        //  echo $user->params->id;
       
        $id = $user->params->id;
        $stmt = $con->prepare("DELETE FROM `user_info` WHERE PK_userID=?"); 
        $stmt->bind_param("i", $id);
          
       
    
        // if(mysqli_query($con, $stmt)){
        //     $data = ['status' => 0, 'message' => "Account Deleted Successfully!"];
        // }   
        // echo json_encode($data);
        break;
        mysqli_close($con);
    }

?> 

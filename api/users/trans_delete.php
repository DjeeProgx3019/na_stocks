<?php
include '../../config/config.php';

$method=$_SERVER['REQUEST_METHOD'];

switch($method){
    case 'POST': 
        
        // decodes input from front-end
        $na_stocks = json_decode(file_get_contents("php://input"));
        $refnum=$na_stocks->refnum;

        $stmt=("DELETE FROM stocks WHERE refnum='$refnum'");
        if(mysqli_query($con,$stmt)){
            $result = ['result'=> 1, 'message' => 'Data Success'];
          
        }
       
  
        echo json_encode($result);
        break;
        mysqli_close($con);
    }

?> 



<?php
include '../../config/config.php';
$method=$_SERVER['REQUEST_METHOD'];

switch($method){
    case 'POST': 
        $na_stocks = json_decode(file_get_contents("php://input"));
        $refnum = $na_stocks->refnum;
        
        $stmt=$con->prepare("UPDATE stocks SET `status` =4 WHERE refnum='$refnum';");
        // $stmt->bind_param('s');
        if($stmt->execute()){
            $result = ['result'=> 1, 'message' => 'Data Success'];
        }
        echo json_encode($result);
        break;
        mysqli_close($con);
}

?> 
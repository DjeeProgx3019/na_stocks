<?php
include '../../config/config.php';
$method=$_SERVER['REQUEST_METHOD'];

switch($method){
    case 'POST': 
        $na_stocks = json_decode(file_get_contents("php://input"));
        $PK_accID = $na_stocks->PK_accID;
        
        $stmt=$con->prepare("UPDATE account SET istatus=2 WHERE PK_accID=$PK_accID;");
        // $stmt->bind_param('i');
        if($stmt->execute()){
            $result = ['result'=> 1, 'message' => 'Data Success'];
        }
        echo json_encode($result);
        break;
        mysqli_close($con);
}

?> 
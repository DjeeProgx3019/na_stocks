<?php
include '../config/config.php';

$method=$_SERVER['REQUEST_METHOD'];

switch($method){
    case 'GET':
    
        $stmt=$con->prepare("SELECT * FROM `user_info` INNER JOIN account ON user_info.PK_accID=account.PK_accID INNER JOIN departments ON user_info.PK_deptID=departments.PK_deptID WHERE status=1");
        $stmt->execute();
        $assigned = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        echo json_encode($assigned);
        break;
        mysqli_close($con);
    }
?>
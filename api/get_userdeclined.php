<?php
include '../config/config.php';

$method=$_SERVER['REQUEST_METHOD'];

switch($method){
    case 'GET':
    
        $stmt=$con->prepare("SELECT * FROM user_info LEFT JOIN account ON user_info.FK_accID=account.PK_accID LEFT JOIN departments ON user_info.FK_deptID=departments.PK_deptID LEFT JOIN roles ON user_info.FK_roleID=roles.PK_roleID  WHERE istatus=2");
        $stmt->execute();
        $assigned = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        echo json_encode($assigned);
        break;
        mysqli_close($con);
    }
?>
<?php
include '../config/config.php';

$method=$_SERVER['REQUEST_METHOD'];

switch($method){
    case 'GET':
        // $stmt=$con->prepare("SELECT first_name, last_name, department, role FROM user_info WHERE role != "Admin" " );

        $stmt=$con->prepare("SELECT * FROM user_info LEFT JOIN departments ON user_info.PK_deptID=departments.PK_deptID LEFT JOIN account ON user_info.PK_accID=account.PK_accID WHERE username=?;");
        $stmt->bind_param('s', $_GET['userinfo']);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);


        echo json_encode($result);
        break;
        mysqli_close($con);
    }
?>
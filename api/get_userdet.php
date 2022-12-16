<?php
include '../config/config.php';

$method=$_SERVER['REQUEST_METHOD'];

switch($method){
    case 'GET':
        // $stmt=$con->prepare("SELECT first_name, last_name, department, role FROM user_info WHERE role != "Admin" " );

        $stmt=$con->prepare("SELECT * FROM user_info LEFT JOIN departments ON user_info.FK_deptID=departments.PK_deptID LEFT JOIN account ON user_info.FK_accID=account.PK_accID LEFT JOIN roles ON user_info.FK_roleID=roles.PK_roleID WHERE PK_userID=?;");
        $stmt->bind_param('s', $_GET['userinfo']);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);


        echo json_encode($result);
        break;
        mysqli_close($con);
    }
?>
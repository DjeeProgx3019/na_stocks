<?php
include '../config/config.php';

$method=$_SERVER['REQUEST_METHOD'];

switch($method){
    case 'GET':
        // $stmt=$con->prepare("SELECT first_name, last_name, department, role FROM user_info WHERE role != "Admin" " );

        $stmt=$con->prepare("SELECT PK_userID FROM user_info LEFT JOIN account ON user_info.FK_accID=account.PK_accID WHERE username=?;");
        $stmt->bind_param('i', $_GET['PK_userID']);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);


        echo json_encode($result);
        break;
        mysqli_close($con);
    }
?>
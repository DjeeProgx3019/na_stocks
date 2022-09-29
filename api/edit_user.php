<?php
include '../config/config.php';

$method=$_SERVER['REQUEST_METHOD'];

switch($method){
    case 'GET':
        // $stmt=$con->prepare("SELECT first_name, last_name, department, role FROM user_info WHERE role != "Admin" " );
        $stmt=$con->prepare("SELECT username, `password` FROM account");
        $stmt->execute();
        $assigned = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        echo json_encode($assigned);
        break;
        mysqli_close($con);
    }
?>
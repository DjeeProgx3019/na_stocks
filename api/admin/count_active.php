<?php
include '../../config/config.php';

$method=$_SERVER['REQUEST_METHOD'];

switch($method){
    case 'GET':
        $stmt=$con->prepare("SELECT COUNT(PK_accID) AS active FROM account WHERE istatus=1;");
        $stmt->execute();
        $assigned = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        echo json_encode($assigned);
        break;
        mysqli_close($con);
    }
?>
<?php
include '../../config/config.php';

$method=$_SERVER['REQUEST_METHOD'];

switch($method){
    case 'GET':
        $stmt=$con->prepare("SELECT DISTINCT refnum, first_name, last_name FROM stocks RIGHT JOIN user_info ON stocks.FK_userID=user_info.PK_userID WHERE `status` =3;");
        $stmt->execute();
        $assigned = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        echo json_encode($assigned);
        break;
        mysqli_close($con);
    }
?>
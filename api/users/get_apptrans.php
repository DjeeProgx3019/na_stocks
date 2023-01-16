<?php
include '../../config/config.php';

$method=$_SERVER['REQUEST_METHOD'];

switch($method){
    case 'GET':
        $stmt=$con->prepare("SELECT DISTINCT refnum FROM stocks LEFT JOIN user_info ON stocks.FK_userID=user_info.PK_userID LEFT JOIN account ON user_info.FK_accID=account.PK_accID where status=1 and username=?;");
        $stmt->bind_param('s', $_GET['items']);
        $stmt->execute();
        $assigned = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        echo json_encode($assigned);
        break;
        mysqli_close($con);
    }
?>
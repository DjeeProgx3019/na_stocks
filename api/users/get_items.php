<?php
include '../../config/config.php';

$method=$_SERVER['REQUEST_METHOD'];

switch($method){
    case 'GET':
        $stmt=$con->prepare("SELECT username,itemdesc, qty, uom, unitprice FROM stocks LEFT JOIN user_info ON stocks.FK_userID=user_info.PK_userID LEFT JOIN account ON user_info.FK_accID=account.PK_accID WHERE refnum =?;");
        // $stmt=$con->prepare("SELECT itemdesc,qty,uom,unitprice,istatus FROM stocks where refnum =?;");
        $stmt->bind_param('s', $_GET['data']);
        $stmt->execute();
        $assigned = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        echo json_encode($assigned);
        break;
        mysqli_close($con);
    }
?>
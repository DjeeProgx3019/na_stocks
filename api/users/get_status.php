<?php
include '../../config/config.php';

$method=$_SERVER['REQUEST_METHOD'];

switch($method){
    case 'GET':
        $stmt=$con->prepare("SELECT DISTINCT status FROM stocks WHERE refnum =?;");
        // $stmt=$con->prepare("SELECT itemdesc,qty,uom,unitprice,istatus FROM stocks where refnum =?;");
        $stmt->bind_param('s', $_GET['istatus']);
        $stmt->execute();
        $assigned = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        echo json_encode($assigned);
        break;
        mysqli_close($con);
    }
?>
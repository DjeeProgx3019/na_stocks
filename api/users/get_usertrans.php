<?php
include '../../config/config.php';

$method=$_SERVER['REQUEST_METHOD'];

switch($method){
    case 'GET':
        $stmt=$con->prepare("SELECT DISTINCT first_name, last_name, department, refnum, ctrlnum, date_added FROM stocks RIGHT JOIN user_info ON stocks.FK_userID=user_info.PK_userID LEFT JOIN departments ON user_info.FK_deptID=departments.PK_deptID WHERE refnum =?;");
        // $stmt=$con->prepare("SELECT itemdesc,qty,uom,unitprice,istatus FROM stocks where refnum =?;");
        $stmt->bind_param('s', $_GET['item']);
        $stmt->execute();
        $assigned = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        echo json_encode($assigned);
        break;
        mysqli_close($con);
    }
?>
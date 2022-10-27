<?php
include '../config/config.php';

$method=$_SERVER['REQUEST_METHOD'];

switch($method){
    case 'GET':

        $stmt=$con->prepare("SELECT * FROM register INNER JOIN departments ON register.PK_deptID=departments.PK_deptID ;");
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);


        echo json_encode($result);
        break;
        mysqli_close($con);
    }
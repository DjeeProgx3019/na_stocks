<?php
include '../config/config.php';

$method=$_SERVER['REQUEST_METHOD'];

switch($method){
    case 'GET':
        $stmt=$con->prepare("SELECT * FROM (SELECT *, YEAR(date_added) as added FROM stocks ) as added WHERE added=?;");
        $stmt->bind_param('s', $_GET['dateSelected']);  
        $stmt->execute();
        $assigned = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        echo json_encode($assigned);
        break;
        mysqli_close($con);
    }
?>
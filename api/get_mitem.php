<?php
include '../config/config.php';

$method=$_SERVER['REQUEST_METHOD'];

switch($method){
    case 'GET':
        $stmt=$con->prepare("SELECT *, DATE_FORMAT(date_added, '%m-%Y')= ? as added FROM stocks;");
        $stmt->bind_param('s', $_GET['items']);
        $stmt->execute();
        $assigned = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        echo json_encode($assigned);
        break;
        mysqli_close($con);
    }
?>
<?php
include '../config/config.php';

$method=$_SERVER['REQUEST_METHOD'];

switch($method){
    case 'GET':
      

        $stmt=$con->prepare("SELECT * FROM  departments  WHERE PK_deptID=?;");
        $stmt->bind_param('s', $_GET['dept']);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);


        echo json_encode($result);
        break;
        mysqli_close($con);
    }
?>
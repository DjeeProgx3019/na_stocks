<?php
include '../config/config.php';

$method=$_SERVER['REQUEST_METHOD'];

switch($method){
    case 'POST':
        $na_stocks = json_decode(file_get_contents("php://input"));
     
        $deptname=$na_stocks->department;

        $stmt=$con->prepare("INSERT INTO department(dept_name) VALUES (?)");
        $stmt->bind_param("s",$deptname);

  

        if($stmt->execute()){
            $result = ['result' => 1, 'message'=> 'Data Success'];
        }
        echo json_encode($result);
        break;
        mysqli_close($com);
}
?>
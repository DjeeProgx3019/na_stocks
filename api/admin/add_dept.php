<?php
include '../../config/config.php';

$method=$_SERVER['REQUEST_METHOD'];

switch($method){
    case 'POST':
        $na_stocks = json_decode(file_get_contents("php://input"));
       $PK_deptID = (rand(1,100000));
        $department=$na_stocks->department;
       
        $stmt=$con->prepare("INSERT INTO departments(PK_deptID, department) VALUES (?,?)");
        $stmt->bind_param("is",$PK_deptID,$department);


        if($stmt->execute()){
            $result = ['result' => 1, 'message'=> 'Data Success'];
        }
        echo json_encode($result);
        break;
        mysqli_close($com);
}
?>
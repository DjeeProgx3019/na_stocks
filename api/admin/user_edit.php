<?php
include '../../config/config.php';

$method=$_SERVER['REQUEST_METHOD'];

switch($method){
    case 'POST': 
        
        // decodes input from front-end
        $na_stocks = json_decode(file_get_contents("php://input"));
        $PK_userID=$na_stocks->PK_userID;
        $FK_accID=$na_stocks->FK_accID;
        $role=$na_stocks->role;
        $dept=$na_stocks->dept;
        $firstName=$na_stocks->firstName;
        $lastName=$na_stocks->lastName;
        $username=$na_stocks->username;

        $stmt=("UPDATE user_info SET FK_deptID=$dept,FK_roleID=$role,last_name=$lastName,first_name=$firstName WHERE PK_userID=$PK_userID;");
        if(mysqli_query($con,$stmt)){
            // $info=("UPDATE account SET username=$username WHERE PK_accID=$FK_accID;");
            $result = ['result'=> 1, 'message' => 'Data Success'];
        } else{ $result = ['result'=> 0, 'message' => 'Failed to Update'];}
           
          
      
  
        echo json_encode($result);
        break;
        mysqli_close($con);
    }

?> 
<?php
include '../config/config.php';

$method=$_SERVER['REQUEST_METHOD'];

switch($method){
    case 'POST': 
        
        // decodes input from front-end
        $user = json_decode(file_get_contents("php://input"));
        $id = $user->params->id;
        $stmt = $con->prepare("SELECT FROM register WHERE PK_regID=?"); 
        
        if (mysqli_num_rows($stmt) < 1) {
        $Pk_accID=(rand(1,100000));
         $username = $user->username;
         $type = $user->type;
         $password = password_hash($user->password, PASSWORD_DEFAULT);

        $Pk_userID=(rand(1,100000));
        $firstname = $user->firstName;
        $lastname = $user->lastName;
        $department = $user->department;
        $role = $user->role;

        $stmt = "INSERT INTO account(PK_accID, username, `password`, usertype) VALUES ('$Pk_accID','$username','$password','$type')";
         
        $results = mysqli_query($con, $stmt);

        $info = "INSERT INTO user_info(PK_userID, PK_accID, last_name, first_name, department,`role`) VALUES ('$Pk_userID','$Pk_accID','$lastname' ,'$firstname','$department', '$role')";
      
        $results = mysqli_query($con, $info);

        }
        else {
            $data = ['status' => 2, 'message' => "Failed to create record."];
        }
        
        echo json_encode($data);
        break;
    }

?> 



    
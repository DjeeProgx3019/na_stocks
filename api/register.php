<?php
include '../config/config.php';

$method=$_SERVER['REQUEST_METHOD'];

switch($method){
    case 'POST': 
        
        // decodes input from front-end
        $info = json_decode(file_get_contents("php://input"));
         
         $username = $user->username;
         $type = $user->usertype;
         $password = $user->password;

        $firstname = $user->firstName;
        $lastname = $user->lastName;
        $department = $user->department;

        $check = "SELECT * FROM account WHERE username = '$username'";
        $checking  = mysqli_query($con, $check);

       
        if (mysqli_num_rows($checking) < 1) {
            $stmt = "INSERT INTO account(PK_accId, username, `password`, `usertype`) VALUES ('$Pk_acc','$username','$password','$type');";
            $results = mysqli_query($con, $stmt);

            $info = "INSERT INTO user_info(PK_userId, FK_accountId, first_name, last_name, department,`role`) VALUES ('$Pk_userId','$Pk_accId','$firstname','$lastname','$department' '$role')";
            $results = mysqli_query($con, $info);

            $data = ['status' => 1, 'message' => "Account Added Successfully!"];
        } else {
            $data = ['status' => 2, 'message' => "Failed to create record."];
        }


        
        
        echo json_encode($result);
        break;
    }

?> 
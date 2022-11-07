<?php
include '../config/config.php';

$method=$_SERVER['REQUEST_METHOD'];

switch($method){
    case 'POST': 
        
        // decodes input from front-end
        $user = json_decode(file_get_contents("php://input"));
     
         $Pk_accID=(rand(1,100000));
         $username = $user->username;
         $type = $user->type;
         $password1 = password_hash($user->password1, PASSWORD_DEFAULT);

        $Pk_userID=(rand(1,100000));
        $department= $user->department;
        $firstName = $user->firstName;
        $lastName = $user->lastName;
        $role = $user->role;
        $status1 = $user->status1;

        // $check_dept = "SELECT * FROM departments WHERE department = '$department'";
        // $res = mysqli_query($con, $check_dept);
        // if(mysqli_num_rows($res)){
        //     while($row = mysqli_fetch_assoc($res)){
        //         $PK_deptID = $row['PK_deptID'];
        //     }
        // }

        $check = "SELECT * FROM account WHERE username = '$username'";
        $checking = mysqli_query($con, $check);
  
        if (mysqli_num_rows($checking) < 1) {
            $stmt = "INSERT INTO account(PK_accID, username, `password`, usertype) VALUES ('$Pk_accID','$username','$password1','$type')";
            $results = mysqli_query($con, $stmt);
             
            $info = "INSERT INTO user_info(PK_userID, PK_accID, PK_deptID, last_name, first_name, `role`, `status`) VALUES ('$Pk_userID', '$Pk_accID', '$department', '$lastName',' $firstName','$role','$status1')";
            $results = mysqli_query($con, $info); 
            
            $data = ['status' => 1, 'message' => "Account Added Successfully!"];    
        } 
        else {
            $data = ['status' => 2, 'message' => "Failed to Create Record."];
        }  
        echo json_encode($data);
        break;
    }

?> 



    
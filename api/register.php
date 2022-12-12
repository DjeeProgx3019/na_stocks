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
         $status1 = $user->status1;

        $Pk_userID=(rand(1,100000));
        $department= $user->department;
        $userRole= $user->userRole;
        $firstName = $user->firstName;
        $lastName = $user->lastName;
   
       
        $date1 = $user->date1;

       

        $check = "SELECT * FROM account WHERE username = '$username'";
        $checking = mysqli_query($con, $check);
  
        if (mysqli_num_rows($checking) < 1) {
            $stmt = "INSERT INTO account( PK_accID,username, `password`, usertype, `istatus`) VALUES ('$Pk_accID','$username','$password1','$type','$status1')";
            $results = mysqli_query($con, $stmt);
             
            $info = "INSERT INTO user_info( PK_userID, FK_accID, FK_deptID, FK_roleID, last_name, first_name,  date_created) VALUES ('$Pk_userID', '$Pk_accID', '$department',  '$userRole', '$lastName',' $firstName','$date1')";
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



    
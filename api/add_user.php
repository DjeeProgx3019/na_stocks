<?php
include '../config/config.php';

$method=$_SERVER['REQUEST_METHOD'];

switch($method){
    case 'POST':
        $register = json_decode(file_get_contents("php://input"));
        
        $PK_regID=(rand(1,1000000));
        $department=$register->department;
        $username = $register->username;
        $type = $register->type;
        $password= password_hash($register->password, PASSWORD_DEFAULT);
        $firstname=$register->firstName;
        $lastname=$register->lastName;
        $role=$register->role;

        $check ="SELECT * FROM register WHERE username = '$username'";
        $checking = mysqli_query($con, $check);

        if (mysqli_num_rows($checking) < 1){
                $details = "INSERT INTO `register`(`PK_regID`, `PK_deptID`, `username`, `password`, `usertype`, `first_name`, `last_name`, `role`) VALUES ('$PK_regID', '$department', '$username',  '$password', '$type','$firstname', '$lastname', '$role')";
                mysqli_query($con, $details);
                $data = ['status' => 1, 'message' => "Account Added Successfully!"];
            }
        else {
            $data = ['status' => 2, 'message' => "Failed to create record."];
        }
        
        echo json_encode($data);
        break;
        
        

}

?>
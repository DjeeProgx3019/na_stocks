<?php
include '../config/config.php';

$method=$_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'POST':
        $user = json_decode(file_get_contents('php://input'));

        $username = $user->username;
        $password = $user->password;

        $stmt = $con->prepare("SELECT * FROM account WHERE username = ?;");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if (mysqli_num_rows($result) != 0) {
            while ($user = mysqli_fetch_assoc($result)) {
                if (password_verify($password, $user['password'])) {
                    if ($user['usertype'] === '0') {
                        $role = 'admin';
                    }
                    elseif($user['usertype'] !== '0'){
                        $role = 'users';
                    }
                    $data = ['status' => 1, 'message' => "Success", 'user' => $role];
                } else {
                    $data = ['status' => 0, 'message' => "Invalid password"];
                }
            }
        } else {
            $data = ['status' => 0, 'message' => "No Username"];
        }
        echo json_encode($data);
        break;
}
?>
<?php
include '../config/config.php';

$method=$_SERVER['REQUEST_METHOD'];

switch($method){
    case 'GET':
       
             $row=$con->prepare("SELECT COUNT(DISTINCT (refnum)) as 'row' from stocks WHERE date_added=?");
            // $row=$con->prepare("SELECT COUNT(*) FROM (SELECT DISTINCT (FK_userID & refnum) as 'row' from stocks WHERE date_added=?) stocks;");
            $row->bind_param('s', $_GET['now']);
            $row->execute(); 
            $count = $row->get_result();
            $count_row = $count->fetch_row();
            $counting = $count_row[0] + 1;
       
        echo json_encode($counting);
        break;
        mysqli_close($con);
    }
?>
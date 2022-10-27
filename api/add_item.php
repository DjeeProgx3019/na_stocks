<?php
include '../config/config.php';

$method=$_SERVER['REQUEST_METHOD'];

switch($method){
    case 'POST': 
        
        // decodes input from front-end
        $na_stocks = json_decode(file_get_contents("php://input"));
        
        // inserts data to db
        $stmt=$con->prepare("INSERT INTO stocks(department, name1, date1, refnum,ctrlnum,itemdesc,qty,uom,unitprice,istatus) VALUES (?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssisis", $department, $name1, $date1, $refnum, $ctrlnum, $itemdesc, $qty, $uom, $unitprice, $istatus );
        // isssss data type per entity

        // $PK_transID = (rand(1,100000));
        $department = $na_stocks->department;
        $name1 = $na_stocks->name1;
        $date1 = $na_stocks->date1;
        $refnum = $na_stocks->refnum;
        $ctrlnum = $na_stocks->ctrlnum;
        $itemdesc = $na_stocks->itemdesc;
        $qty = $na_stocks->qty;
        $uom = $na_stocks->uom;
        $unitprice = $na_stocks->unitprice;
        $istatus = $na_stocks->istatus;

            // if($stmt->execute()){
            //     $result = ['result'=> 1, 'message' =>"Data Successfully Added."];
            // }
        if($stmt->execute()){
            $result = ['result'=> 1, 'message' => 'Data Success'];
        }
        echo json_encode($result);
        break;
        mysqli_close($con);
}

?> 
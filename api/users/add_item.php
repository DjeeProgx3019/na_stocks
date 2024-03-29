<?php
include '../../config/config.php';

$method=$_SERVER['REQUEST_METHOD'];

switch($method){
    case 'POST': 
        
        // decodes input from front-end
        $na_stocks = json_decode(file_get_contents("php://input"));
        $PK_transID = (rand(1,100000));
        $PK_userID1= $na_stocks->PK_userID1;
        $date1 = $na_stocks->date1;
        $refnum = $na_stocks->refnum;
        $ctrlnum = $na_stocks->ctrlnum;
        $itemdesc = $na_stocks->itemdesc;
        $qty = $na_stocks->qty;
        $uom = $na_stocks->uom;
        $unitprice = $na_stocks->unitprice;
        $status = $na_stocks->status;
        
        // inserts data to db
        $stmt=$con->prepare("INSERT INTO stocks( FK_userID, refnum,ctrlnum,itemdesc,qty,uom,unitprice,`status`,date_added) VALUES (?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("issssisis", $PK_userID1,  $refnum, $ctrlnum, $itemdesc, $qty, $uom, $unitprice, $status,$date1, );
        if($stmt->execute()){
            $result = ['result'=> 1, 'message' => 'Data Success'];
        }
        echo json_encode($result);
        break;
        mysqli_close($con);
}

?> 
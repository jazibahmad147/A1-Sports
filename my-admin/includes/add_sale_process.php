<?php

include("../database/connection.php");
    
    $valid['success'] = array('success' => false, 'messages' => array());

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        // fetch Old id... 
        $query = "SELECT id FROM sales ORDER BY id DESC LIMIT 1";
        $Result = $con->query($query);
        $result_row = $Result->fetch_array();
        $oldId = $result_row[0]+1;
        // New Id
        // invoice = 4686489;
        $saleId = "4686489".$oldId;

        $date = date("Y-m-d");

        // Customer Detail...
        $customerId = mysqli_real_escape_string($con, $_POST['customer']);
        // $customerName = mysqli_real_escape_string($con, $_POST['customerName']);
        // $cutomerAddress = mysqli_real_escape_string($con, $_POST['customerAddress']);
        // $cutomerPhone = mysqli_real_escape_string($con, $_POST['customerPhone']);


        $subTotal = mysqli_real_escape_string($con, $_POST['subTotal']);
        $etc = mysqli_real_escape_string($con, $_POST['etc']);
        $discount = mysqli_real_escape_string($con, $_POST['discount']);
        $grandTotal = mysqli_real_escape_string($con, $_POST['grandTotal']);
        $paid = mysqli_real_escape_string($con, $_POST['paid']);
        $balance = mysqli_real_escape_string($con, $_POST['balance']);
        $expDate = mysqli_real_escape_string($con, $_POST['expDate']);
        $cat = "sale";



        // storing sale...
        $saleSql = "INSERT INTO sales (date,saleId,customerId,subTotal,etc,discount,grandTotal,paid,balance,expDate,cat) VALUES ('$date','$saleId','$customerId','$subTotal','$etc','$discount','$grandTotal','$paid','$balance','$expDate','$cat')";
        mysqli_query($con, $saleSql);


        // storing sales items...
        $count = count($_POST["pKey"]);
        $exactWholePriceOfItem = 0;
        for($i=0; $i<$count; $i++){

            $pId = mysqli_real_escape_string($con, $_POST['pKey'][$i]);
            $qty = mysqli_real_escape_string($con, $_POST['pQty'][$i]);
            $price = mysqli_real_escape_string($con, $_POST['pPrice'][$i]);
            $total = mysqli_real_escape_string($con, $_POST['pTotal'][$i]);
            
            $saleItemsSql = "INSERT INTO sale_items (saleId,pId,qty,price,total) VALUES ('$saleId','$pId','$qty','$price','$total')";
            mysqli_query($con, $saleItemsSql);

            // fetch quantity + whole sale rate ... 
            $qtyFetched = "SELECT * FROM `stock` WHERE itemId = '$pId'";
            $resultQty = $con->query($qtyFetched);
            $result_row_qty = $resultQty->fetch_array();
            $quantity = $result_row_qty[7]-$qty;
            $wholeSaleRate = $result_row_qty[8];

            $wholePrice = $wholeSaleRate * $qty;
            $exactWholePriceOfItem += $wholePrice;
            
            $updateStock = "UPDATE `stock` SET `qty`='$quantity' WHERE itemId = '$pId'";
            mysqli_query($con, $updateStock);
        }

            $wholeTotal = $exactWholePriceOfItem;
            $updateSaleSheet = "UPDATE `sales` SET `WholeTotal`='$wholeTotal' WHERE saleId = '$saleId'";
            mysqli_query($con, $updateSaleSheet);

      
        $valid['success'] = true;
        $valid['messages'] = "Your Data Inserted Successfully!";
        $valid['class'] = "bg-success";
        $valid['title'] = "Done";

    }else{
        $valid['success'] = false;
        $valid['messages'] = "Your Data Insertion Have Some Error!";
        $valid['class'] = "bg-danger";
        $valid['title'] = "Error";
    }

        
    $con->close();
    echo json_encode($valid);
    // echo $valid;

?>
<?php

include("../database/connection.php");
include("pin.php");
    
    $valid['success'] = array('success' => false, 'messages' => array());

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        $id = mysqli_real_escape_string($con, $_POST['return_sale_record_id']);
        $pinCode = mysqli_real_escape_string($con, $_POST['pinCode']);

        
        // finding invoice id from sales...
        $check = "SELECT * FROM `sales` WHERE id = '$id'";
        $result = mysqli_query($con, $check);
        $num = mysqli_num_rows($result);
        $result_row = $result->fetch_array();
        $invoiceId = $result_row[2];

        

        if($pinCode == $pin){
            
            if($num == 1){

                // finding products from sale items...
                $itemsIdQuery = mysqli_query($con,"SELECT * FROM `sale_items` WHERE saleId = '$invoiceId'");
                while($result = mysqli_fetch_array($itemsIdQuery)){
                    $pId = $result['pId'];
                    $qty = $result['qty'];
                    // echo $pId." ".$qty."<br>";

                    // fetch quantity ... 
                    $qtyFetched = "SELECT * FROM `stock` WHERE itemId = '$pId'";
                    $resultQty = $con->query($qtyFetched);
                    $result_row_qty = $resultQty->fetch_array();
                    $quantity = $result_row_qty[7]+$qty;

                    // update quantity in gold stock
                    $updateStock = "UPDATE `stock` SET `qty`='$quantity' WHERE itemId = '$pId'";
                    mysqli_query($con, $updateStock);
                }

                $salesSql = "DELETE FROM `sales` WHERE id = '$id'";
                mysqli_query($con, $salesSql);

                $salesItemSql = "DELETE FROM `sale_items` WHERE saleId = '$invoiceId'";
                mysqli_query($con, $salesItemSql);

                $paymentSql = "DELETE FROM `payments` WHERE invoiceId = '$invoiceId'";
                mysqli_query($con, $paymentSql);

                $valid['success'] = true;
                $valid['messages'] = "Your Data Returned Successfully!";
                $valid['class'] = "bg-success";
                $valid['title'] = "Done";

            }else{
                $valid['success'] = false;
                $valid['messages'] = "Your Data Not Exist!";
                $valid['class'] = "bg-danger";
                $valid['title'] = "Error";
            }

        }else{
            $valid['success'] = false;
            $valid['messages'] = "Your entered PIN is wrong!";
            $valid['class'] = "bg-danger";
            $valid['title'] = "Error";
        }

    $con->close();
    echo json_encode($valid);


}

?>
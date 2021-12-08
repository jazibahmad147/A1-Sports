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
        
        $customer = mysqli_real_escape_string($con, $_POST['customer']);
        $title = mysqli_real_escape_string($con, $_POST['title']);
        $desc = mysqli_real_escape_string($con, $_POST['desc']);
        $grandTotal = mysqli_real_escape_string($con, $_POST['grandTotal']);
        $paid = mysqli_real_escape_string($con, $_POST['paid']);
        $budget = mysqli_real_escape_string($con, $_POST['budget']);
        $expDate = mysqli_real_escape_string($con, $_POST['expDate']);
        $cat = "repairing";

        $sql = "INSERT INTO sales (date,saleId,customerId,grandTotal,paid,expDate,WholeTotal,cat) VALUES ('$date','$saleId','$customer','$grandTotal','$paid','$expDate','$budget','$cat')";
        mysqli_query($con, $sql);
        $sql = "INSERT INTO repairing (date,saleId,title,description) VALUES ('$date','$saleId','$title','$desc')";
        mysqli_query($con, $sql);

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
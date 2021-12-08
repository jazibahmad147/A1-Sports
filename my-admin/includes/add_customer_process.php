<?php

include("../database/connection.php");
    
    $valid['success'] = array('success' => false, 'messages' => array());

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        $name = mysqli_real_escape_string($con, $_POST['customerName']);
        $phone = mysqli_real_escape_string($con, $_POST['customerPhone']);
        $address = mysqli_real_escape_string($con, $_POST['customerAddress']);

        // fetch Old Key... 
        $query = "SELECT id FROM customers ORDER BY id DESC LIMIT 1";
        $Result = $con->query($query);
        $result_row = $Result->fetch_array();
        $key = $result_row[0]+1;

        // category = 17675526;
        $itemId = "17675526".$key;


        $sql = "INSERT INTO customers (custId,name,phone,address) VALUES ('$itemId','$name','$phone','$address')";
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
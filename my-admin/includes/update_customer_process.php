<?php

include("../database/connection.php");
    
    $valid['success'] = array('success' => false, 'messages' => array());

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        $id = mysqli_real_escape_string($con, $_POST['editCustomerId']);
        $name = mysqli_real_escape_string($con, $_POST['editCustomerName']);
        $phone = mysqli_real_escape_string($con, $_POST['editCustomerPhone']);
        $address = mysqli_real_escape_string($con, $_POST['editCustomerAddress']);
        
        // Checking emails recurring...
        $check = "SELECT * FROM `customers` WHERE id = $id";
        $result = mysqli_query($con, $check);
        $num = mysqli_num_rows($result);

        if($num == 1){

            $sql = "UPDATE `customers` SET `name`='$name',`phone`='$phone',`address`='$address' WHERE id = $id";
            mysqli_query($con, $sql);

            $valid['success'] = true;
            $valid['messages'] = "Your Updation Successfully Done!";
            $valid['class'] = "bg-success";
            $valid['title'] = "Done";
        }else{
            $valid['success'] = false;
            $valid['messages'] = "Your Updation Have Some Error!";
            $valid['class'] = "bg-danger";
            $valid['title'] = "Error";
        }

    $con->close();
    echo json_encode($valid);


}

?>
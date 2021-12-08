<?php

include("../database/connection.php");
    
    $valid['success'] = array('success' => false, 'messages' => array());

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        $date = mysqli_real_escape_string($con, $_POST['date']);
        $title = mysqli_real_escape_string($con, $_POST['title']);
        $desc = mysqli_real_escape_string($con, $_POST['desc']);
        $amount = mysqli_real_escape_string($con, $_POST['amount']);

        // Checking date recurring...
        $check = "SELECT * FROM `bank` WHERE date = '$date'";
        $result = mysqli_query($con, $check);
        $num = mysqli_num_rows($result);

        if($num == 1){
            $valid['success'] = false;
            $valid['messages'] = "Already Statement Submitted.!";
            $valid['class'] = "bg-danger";
            $valid['title'] = "Error";
        }else{

            $sql = "INSERT INTO bank (date,title,description,amount) VALUES ('$date','$title','$desc','$amount')";
            mysqli_query($con, $sql);

            $valid['success'] = true;
            $valid['messages'] = "Your Data Inserted Successfully!";
            $valid['class'] = "bg-success";
            $valid['title'] = "Done";
       }

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
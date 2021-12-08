<?php

include("../database/connection.php");
include("pin.php");
    
    $valid['success'] = array('success' => false, 'messages' => array());

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        $id = mysqli_real_escape_string($con, $_POST['delete_expense_id']);
        $pinCode = mysqli_real_escape_string($con, $_POST['pinCode']);

        
        // Checking emails recurring...
        $check = "SELECT * FROM `expenses` WHERE id = '$id'";
        $result = mysqli_query($con, $check);
        $num = mysqli_num_rows($result);

        if($pinCode == $pin){
            
            if($num == 1){

                $sql = "DELETE FROM `expenses` WHERE id = '$id'";
                mysqli_query($con, $sql);
    
                $valid['success'] = true;
                $valid['messages'] = "Your Data Deleted Successfully!";
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
<?php

include("../database/connection.php");
    
    $valid['success'] = array('success' => false, 'messages' => array());

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        $name = mysqli_real_escape_string($con, $_POST['categoryName']);

        // fetch Old Key... 
        $query = "SELECT id FROM categories ORDER BY id DESC LIMIT 1";
        $Result = $con->query($query);
        $result_row = $Result->fetch_array();
        $key = $result_row[0]+1;

        // category = 11723568;
        $itemId = "11723568".$key;


        $sql = "INSERT INTO categories (catId,name) VALUES ('$itemId','$name')";
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
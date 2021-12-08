<?php

include("../database/connection.php");
    
    $valid['success'] = array('success' => false, 'messages' => array());

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        $date = mysqli_real_escape_string($con, $_POST['date']);
        $category = mysqli_real_escape_string($con, $_POST['category']);
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $company = mysqli_real_escape_string($con, $_POST['company']);
        $description = mysqli_real_escape_string($con, $_POST['description']);
        $qty = mysqli_real_escape_string($con, $_POST['qty']);
        $whole_sale_price = mysqli_real_escape_string($con, $_POST['whole_sale_price']);
        $retail_price = mysqli_real_escape_string($con, $_POST['retail_price']);

        // fetch Old Key... 
        $query = "SELECT id FROM stock ORDER BY id DESC LIMIT 1";
        $Result = $con->query($query);
        $result_row = $Result->fetch_array();
        $key = $result_row[0]+1;

        // stock key = 67514;
        $itemId = "1000".$key;


        // File...
        $files = $_FILES['fileToUpload'];
        $filename = $files['name'];
        $fileerror = $files['error'];
        $filetmp = $files['tmp_name'];

        $fileext = explode('.',$filename);
        $filecheck = strtolower(end($fileext));
        $fileextstored = array('png', 'jpg', 'jpeg');

        if(in_array($filecheck,$fileextstored)){
            $destinationfile = '../media/stock/'.$itemId.'-'.$filename;
            $destinationForDatabase = $itemId."-".$filename;
            move_uploaded_file($filetmp,$destinationfile);
        }
        if($files == ""){
            $sql = "INSERT INTO stock (itemId,date,category,name,company,description,qty,wholeSalePrice,retailPrice) VALUES ('$itemId','$date','$category','$name','$company','$description','$qty','$whole_sale_price','$retail_price')";
        }else{
            $sql = "INSERT INTO stock (itemId,date,category,name,company,description,qty,wholeSalePrice,retailPrice,image) VALUES ('$itemId','$date','$category','$name','$company','$description','$qty','$whole_sale_price','$retail_price','$destinationForDatabase')";
        }

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
<?php

include("../database/connection.php");
    
    $valid['success'] = array('success' => false, 'messages' => array());

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        $id = mysqli_real_escape_string($con, $_POST['edit_id']);
        $itemId = mysqli_real_escape_string($con, $_POST['edit_item_id']);
        $date = mysqli_real_escape_string($con, $_POST['edit_date']);
        $category = mysqli_real_escape_string($con, $_POST['edit_category']);
        $name = mysqli_real_escape_string($con, $_POST['edit_name']);
        $company = mysqli_real_escape_string($con, $_POST['edit_company']);
        $description = mysqli_real_escape_string($con, $_POST['edit_description']);
        $qty = mysqli_real_escape_string($con, $_POST['edit_qty']);
        $whole_sale_price = mysqli_real_escape_string($con, $_POST['edit_whole_sale_price']);
        $retail_price = mysqli_real_escape_string($con, $_POST['edit_retail_price']);
        
        // Checking emails recurring...
        $check = "SELECT * FROM `stock` WHERE id = $id";
        $result = mysqli_query($con, $check);
        $num = mysqli_num_rows($result);

        if($num == 1){

            // File...
            $files = $_FILES['edit_fileToUpload'];
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
            
            if($filename == ""){
                $sql = "UPDATE `stock` SET `date`='$date',`category`='$category',`name`='$name',`company`='$company',`description`='$description',`qty`='$qty',`wholeSalePrice`='$whole_sale_price',`retailPrice`='$retail_price' WHERE id = $id";
                mysqli_query($con, $sql);
            }else{
                $sql = "UPDATE `stock` SET `date`='$date',`category`='$category',`name`='$name',`company`='$company',`description`='$description',`qty`='$qty',`wholeSalePrice`='$whole_sale_price',`retailPrice`='$retail_price',`image`='$destinationForDatabase' WHERE id = $id";
                mysqli_query($con, $sql);
            }

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
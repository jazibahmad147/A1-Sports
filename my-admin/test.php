<?php

include("database/connection.php");

// $saleId = $_POST['id'];
$today = date("Y-m-d");
// $endDate = date("Y-m-d",strtotime("+7 days"));
$endDate = date("Y-m-d",strtotime("-7 days"));

$sql = sprintf("SELECT subTotal, grandTotal FROM sales WHERE date BETWEEN '$endDate' AND '$today' ORDER BY id DESC");


$result = $con->query($sql);
// $result = mysqli_query($con,$sql);
$data = array();
foreach($result as $row){
    $data[] = $row;
}

// if($result->num_rows > 0) { 
//     $row = $result->fetch_array();
//    } // if num_rows
$result->close();
$con->close();
   
print json_encode($data);


?>
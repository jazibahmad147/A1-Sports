<?php

include("../database/connection.php");

$itemId = $_POST['itemId'];

$sql = "SELECT * FROM companies WHERE id = $itemId";


$result = $con->query($sql);

if($result->num_rows > 0) { 
    $row = $result->fetch_array();
   } // if num_rows
   
$con->close();
   
echo json_encode($row);


?>
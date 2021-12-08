<?php

include("../database/connection.php");

$key = $_POST['key'];
// $goldPathorId = 50;

$sql = "SELECT * FROM stock WHERE itemId = '$key'";
// $sql = "SELECT * FROM rate_list WHERE id = 19";


$result = $con->query($sql);

if($result->num_rows > 0) {
    $row = $result->fetch_array();
   } // if num_rows
   
$con->close();
   
echo json_encode($row);


?>
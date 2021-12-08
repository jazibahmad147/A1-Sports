<?php

include("../database/connection.php");

// $key = $_POST['key'];
// $goldPathorId = 50;

// $items_arr = array();

$sql = "SELECT * FROM stock";
// $sql = "SELECT * FROM rate_list WHERE id = 19";
$result = $con->query($sql);
while($row = mysqli_fetch_array($result)){
    $itemId = $row['itemId'];
    $name = $row['name'];

    $items_arr[] = array("id" => $itemId, "name" => $itemId.' | '.$name);
}

// if($result->num_rows > 0) {
//     $row = $result->fetch_array();
// } // if num_rows
   
$con->close();
   
echo json_encode($items_arr);


?>
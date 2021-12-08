
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Invoice</title>
    <style>
        #invoice{
            border: 2px solid black;
            width: 72mm;
        }
        #header{
            text-align: center;
        }
        small{
            font-size: 11px;
        }
        #date{
            float: left;
            padding-left: 5px;
        }
        #invoiceNo{
            float: right;
            padding-right: 5px;
        }
        #divider{
            /* float: right; */
            padding-left: 18px;
        }
        table,tr,td,th{
            border: 1px solid black;
            margin: auto;
            width: 70mm;
            border-collapse: collapse;
            text-align: center;
        }
        #footer{
            text-align: center;
        }
        #contactInfo{
            text-decoration: none;
            font-weight: 100;
        }
    </style>
</head>
<body>

</body>
</html>

<?php

include("../database/connection.php");

if($_GET["id"]){
   
    $id = $_GET["id"];
    $query = "SELECT * FROM `sales` WHERE id = '$id'";
    $Result = $con->query($query);
    $result_row = $Result->fetch_array();

    $date = $result_row[1];
    $saleId = $result_row[2];
    $subTotal = $result_row[4];
    $etc = $result_row[5];
    $discount = $result_row[6];
    $grandTotal = $result_row[7];
    $initialPaid = $result_row[8];
    $balance = $result_row[9];

    // payment checking 
    $totalPayments = 0;
    $paymentQuery = mysqli_query($con,"SELECT * FROM `payments` WHERE invoiceId = '$saleId'");
    while($fetchPaymentsResult = mysqli_fetch_array($paymentQuery)){
        $myPaymnents = $fetchPaymentsResult['payment'];
        $totalPayments += $myPaymnents;
    }
    if($totalPayments == ""){
        $totalPayments = 0;
    }
    $finalPayment = $initialPaid + $totalPayments;


    echo '<div id="invoice">
            <div id="header">
                <div id="title">
                    <h3>A1 SPORTS & GARMENTS<br><small><b>College Road Near Aqsa Chowk, Chenab Nagar</b></small></h3>
                    <hr>
                </div>
            </div>
            <div id="subheader">
                <div>
                    <h5><span id="date"> Date: '.$date.' </span><span id="divider"> | </span><span id="invoiceNo"> Invoice No: '.$saleId.'</span></h5>
                    <hr>
                </div>
            </div><br>';

    echo '<table>
            <tr>
                <th>Sr.</th>
                <th>Name</th>
                <th>Desc</th>
                <th>Price</th>
            </tr>';

    // item details 
    $i = 1;
    $itemQuery = mysqli_query($con,"SELECT * FROM `sales` WHERE saleId = '$saleId'");
    while($row = mysqli_fetch_assoc($itemQuery)){

        // fetching item names 
        $itemNameQuery = "SELECT * FROM `repairing` WHERE saleId = '$saleId'";
        $fetchItemName = $con->query($itemNameQuery);
        $result_row = $fetchItemName->fetch_array();
        $itemName = $result_row[3];
        $itemDesc = $result_row[4];

        $price = $row["grandTotal"];

        echo '<tr>
            <th>'.$i.'</th>
            <td style="text-align:center">'.$itemName.'</td>
            <td style="text-align:center">'.$itemDesc.'</td>
            <td style="text-align:center">'.$price.'</td>
        </tr>
        <tr>
            <td colspan="5" style="height:30px;"></td>
        </tr>';
        

        $i++;
    }

    echo '<tr>
            <th colspan="3" style="text-align:right; padding-right:10px;">Grand Total</th>
            <td>'.$grandTotal.'</td>
        </tr>
        <tr>
            <th colspan="3" style="text-align:right; padding-right:10px;">Paid</th>
            <td>'.$finalPayment.'</td>
        </tr>
        <tr>
            <th colspan="3" style="text-align:right; padding-right:10px;">Balance</th>
            <td>'.$balance.'</td>
        </tr></table>';


    echo '<div id="footer">
            <h3>Thank You For Shopping</h3>
                <h5>Contact us:<span id="contactInfo"><br>+92 336 4216108<br>+92 336 4216108<br>a1sports@gmail.com</span></h5>
        </div>';

    echo '</div>';

}

// echo '<button onclick="window.print()">Print this page</button>';


?>
<?php

session_start();

include_once("../fpdf/fpdf.php");
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


    // page size 
    $pdf = new FPDF('P','mm',array(80,100));
    // $pdf = new FPDF('P','mm','A4');
    $pdf->AddPage();

    // $pdf->Image('..\images\watermark.png',55,50,-300);

    // Page Border
    $pdf->Rect(2, 2, 76, 96 ,"D");

    // Company Detail
    $pdf->SetFont("Arial","B",28);
    // $pdf->SetXY(20,30);
    // // $pdf->Image('..\images\sw-logo.png',30,25,-300);
    $pdf->SetFont("Arial","B",22);
    $pdf->SetXY(9,7);
    $pdf->Cell(0,0,"A1 SPORTS",0,1,'C');
    $pdf->SetFont("Courier","",9);
    $pdf->SetXY(9,12);
    $pdf->Cell(0,0,"Aqsa Chock, Shop Number 2",0,1,'C');
    $pdf->SetXY(9,15);
    $pdf->Cell(0,0,"",1,1,'C');

    // invoice number 
    $pdf->SetFont("Arial","",9);
    $pdf->SetXY(3.5,19);
    $pdf->Cell(0,0,"Invoice ID: ",0,0);
    $pdf->SetFont("Courier","",10);
    $pdf->SetXY(19,18.8);
    $pdf->Cell(0,0,$saleId,0,1);
    
    // date 
    $pdf->SetFont("Arial","",9);
    $pdf->SetXY(45,19);
    $pdf->Cell(0,0,"Date: ",0,0);
    $pdf->SetFont("Courier","",10);
    $pdf->SetXY(53.3,18.8);
    $pdf->Cell(0,0,$date,0,1);

    // item table 
    $pdf->SetFont("Arial","B",9);
    $pdf->SetXY(3.5,25);
    $pdf->Cell(6,4,"Sr. ",1,0,'C');
    $pdf->Cell(25,4,"Name",1,0,'C');
    $pdf->Cell(12,4,"Qty",1,0,'C');
    $pdf->Cell(13,4,"Price",1,0,'C');
    $pdf->Cell(17,4,"Total",1,0,'C');

    // item details 
    $i = 0;
    $y = 29;
    $itemQuery = mysqli_query($con,"SELECT * FROM `sale_items` WHERE saleId = '$saleId'");
    while($row = mysqli_fetch_assoc($itemQuery)){

        // fetching item names 
        $itemId = $row['pId'];
        $itemNameQuery = "SELECT `name` FROM `stock` WHERE itemId = '$itemId'";
        $fetchItemName = $con->query($itemNameQuery);
        $result_row = $fetchItemName->fetch_array();
        $itemName = $result_row[0];

        $pdf->SetFont("Courier","",8);
        $pdf->SetXY(3.5,$y);
        $pdf->Cell(6,4,$i+1,1,0,'C');
        $pdf->Cell(25,4,$itemName,1,0,'C');
        $pdf->Cell(12,4,$row['qty'],1,0,'C');
        $pdf->Cell(13,4,$row['price'],1,0,'C');
        $pdf->Cell(17,4,$row['total'],1,0,'C');

        $i++;
        $y += 4;
    }

    // invoice totals 
    $y += 2;
    $pdf->SetFont("Arial","",8);
    $pdf->SetXY(34.5,$y);
    $pdf->Cell(20,4,"Sub Total:",1,0,'L');
    $pdf->Cell(22,4,$subTotal,1,0,'C');
    $y += 4;
    $pdf->SetXY(34.5,$y);
    $pdf->Cell(20,4,"Tax:",1,0,'L');
    $pdf->Cell(22,4,$etc,1,0,'C');
    $y += 4;
    $pdf->SetXY(34.5,$y);
    $pdf->Cell(20,4,"Discount:",1,0,'L');
    $pdf->Cell(22,4,$discount,1,0,'C');
    $y += 4;
    $pdf->SetXY(34.5,$y);
    $pdf->Cell(20,4,"Grand Total:",1,0,'L');
    $pdf->Cell(22,4,$grandTotal,1,0,'C');
    $y += 4;
    $pdf->SetXY(34.5,$y);
    $pdf->Cell(20,4,"Paid:",1,0,'L');
    $pdf->Cell(22,4,$finalPayment,1,0,'C');
    $y += 4;
    $pdf->SetXY(34.5,$y);
    $pdf->Cell(20,4,"Balance:",1,0,'L');
    $pdf->Cell(22,4,$balance,1,0,'C');
    $y += 4;

    // $pageY = $y;
    

    // $pdf->Cell(35,5,"Company Name",0,0);
    // // $pdf->Cell(35,5,": ".$_GET["cust_name"],0,1);
 
    // $pdf->Cell(50,10,"",0,1);

    // // $pdf->Cell(10,10,"#",1,0,"C");
    // $pdf->Cell(55,10,"Service",1,0,"C");
    // $pdf->Cell(60,10,"Description",1,0,"C");
    // $pdf->Cell(40,10,"Category",1,0,"C");
    // $pdf->Cell(10,10,"Qty.",1,0,"C");
    // $pdf->Cell(10,10,"Rs.",1,0,"C");
    // $pdf->Cell(15,10,"Total",1,1,"C");

    // // for ($i=0; $i < count($_GET["pid"]); $i++) { 
    // //     // $pdf->Cell(10,10,($i+1),1,0,"C");
    // //     $pdf->SetFont("Arial",null,9);
    // //     $pdf->Cell(55,10,$_GET["pro_name"][$i],1,0,"C");
    // //     $pdf->Cell(60,10,$_GET["detail"][$i],1,0,"C");
    // //     $pdf->Cell(40,10,$_GET["cat_name"][$i],1,0,"C");
    // //     $pdf->Cell(10,10,$_GET["qty"][$i],1,0,"C");
    // //     $pdf->Cell(10,10,$_GET["price"][$i],1,0,"C");
    // //     $pdf->Cell(15,10,$_GET["amt"][$i],1,1,"C");
    // // }

    // $pdf->Cell(50,10,"",0,1);
    
    // $pdf->SetFont("Arial",null,12);
    // $pdf->Cell(50,10,"Sub Total",0,0);
    // // $pdf->Cell(50,10,": ".$_GET["sub_total"],0,1);
    // $pdf->Cell(50,10,"Tax",0,0);
    // // $pdf->Cell(50,10,": ".$_GET["gst"],0,1);
    // $pdf->Cell(50,10,"Discount",0,0);
    // // $pdf->Cell(50,10,": ".$_GET["discount"],0,1);
    // $pdf->Cell(50,10,"Old Balance",0,0);
    // // $pdf->Cell(50,10,": ".$_GET["old_balance"],0,1);
    // $pdf->Cell(50,10,"Net Total",0,0);
    // // $pdf->Cell(50,10,": ".$_GET["net_total"],0,1);
    // $pdf->Cell(50,10,"Paid",0,0);
    // // $pdf->Cell(50,10,": ".$_GET["paid"],0,1);
    // $pdf->Cell(50,10,"Due",0,0);
    // // $pdf->Cell(50,10,": ".$_GET["due"],0,1);
    // $pdf->Cell(50,10,"Payment Type",0,0);
    // // $pdf->Cell(50,10,": ".$_GET["payment_type"],0,1);


    // $pdf->Cell(180,10,"Signature",0,0,"R");
    

    // $pdf->Output("../PDF_INVOICE/PDF_INVOICE_".$_GET["invoice_no"].".pdf","F");

    $pdf->Output();
}

?>
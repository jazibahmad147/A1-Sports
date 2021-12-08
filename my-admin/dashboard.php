<?php
include_once("templates/header.php");
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

<?php

// $today = date('Y-m-d');
$today = date('Y-m-d',strtotime("-1 days"));
$query1 = mysqli_query($con,"SELECT SUM(`grandTotal`) AS grandTotal FROM sales WHERE date = '$today'");
$row1 = mysqli_fetch_assoc($query1); 
$sumGrandTotal = $row1['grandTotal'];
if($sumGrandTotal == ""){
  $sumGrandTotal = 0;
}

// $query2 = mysqli_query($con,"SELECT SUM(`paid`) AS firstPaid FROM sales WHERE date BETWEEN '$fullMonth' AND '$today'");
// $row2 = mysqli_fetch_assoc($query2); 
// $sumFirstPaid = $row2['firstPaid'];
// if($sumFirstPaid == ""){
//   $sumFirstPaid = 0;
// }

// $query3 = mysqli_query($con,"SELECT SUM(`payment`) AS allPayments FROM payments WHERE date BETWEEN '$fullMonth' AND '$today'");
// $row3 = mysqli_fetch_assoc($query3); 
// $sumAllPayments = $row3['allPayments'];
// if($sumAllPayments == ""){
//   $sumAllPayments = 0;
// }
// $addingPaid = $sumFirstPaid + $sumAllPayments;
// $finalBalance = $sumGrandTotal - $addingPaid;
// if($finalBalance == ""){
//   $finalBalance = 0;
// }

$query4 = mysqli_query($con,"SELECT SUM(`budget`) AS budget FROM expenses WHERE date = '$today'");
$row4 = mysqli_fetch_assoc($query4); 
$sumBudget = $row4['budget'];
if($sumBudget == ""){
  $sumBudget = 0;
}

$query5 = mysqli_query($con,"SELECT SUM(`amount`) AS amount FROM bank WHERE date = '$today'");
$row5 = mysqli_fetch_assoc($query5); 
$sumBankAmount = $row5['amount'];
if($sumBankAmount == ""){
  $sumBankAmount = 0;
}

// opening balance 
$query6 = mysqli_query($con,"SELECT SUM(`paid`) AS budget FROM sales WHERE date = '$today'");
$row6 = mysqli_fetch_assoc($query6); 
$paid = $row6['budget'];
if($paid == ""){
  $paid = 0;
}
// recieved payments 
$query7 = mysqli_query($con,"SELECT SUM(`payment`) AS budget FROM payments WHERE date = '$today'");
$row7 = mysqli_fetch_assoc($query7); 
$paymemts = $row7['budget'];
if($paymemts == ""){
  $paymemts = 0;
}
// Expenses
$query8 = mysqli_query($con,"SELECT SUM(`budget`) AS budget FROM expenses WHERE date = '$today'");
$row8 = mysqli_fetch_assoc($query8); 
$expenses = $row8['budget'];
if($expenses == ""){
  $expenses = 0;
}
// Bank
$query9 = mysqli_query($con,"SELECT SUM(`amount`) AS budget FROM bank WHERE date = '$today'");
$row9 = mysqli_fetch_assoc($query9); 
$bank = $row9['budget'];
if($bank == ""){
  $bank = 0;
}
$fianlValOpeningBalance = (($paid + $paymemts) - ($bank + $expenses));

?>


  <section class="content">
      <div class="container-fluid">
        <h5 class="mb-2">Yesterday's Stats</h5>
        <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-cart-arrow-down"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sales</span>
                <span class="info-box-number"><?php echo $sumGrandTotal; ?> Rs</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-wallet"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Bank</span>
                <span class="info-box-number"><?php echo $sumBankAmount; ?> Rs</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fas fa-hand-holding-usd"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Opening Balance</span>
                <span class="info-box-number"><?php echo $fianlValOpeningBalance; ?> Rs</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fas fa-coins"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Expenses</span>
                <span class="info-box-number"><?php echo $sumBudget; ?> Rs</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-md-12">
            <table id="example1" class="table table-bordered table-striped" style="text-align:center;">
              <thead>
              <tr>
                <th>Sales</th>
                <th>Expenses</th>
                <th>Profit</th>
              </tr>
              </thead>
              <tbody>
              <div class="row">
                <div class="col-md-12">
                <div class="form-group">
                  <form action="" method="post">
                    <div class="row">
                        <div class="col-md-6">
                        <label for="type">From</label>
                            <input type="date" class="form-control form-control-sm" name="startDate">
                        </div>
                        <div class="col-md-6">
                        <label for="type">To</label>
                            <input type="date" class="form-control form-control-sm" name="endDate">
                        </div>
                    </div>
                    <br>
                    <input style="width:100px" type="submit" name="show" class="btn btn-primary" value="Show">
                  </form>
                </div>
              </div>
              </div>
              <?php 

                  include_once('database/connection.php');
                  if(isset($_POST['show'])){
                    $startDate = $_POST['startDate'];
                    $endDate = $_POST['endDate'];
                    $query = mysqli_query($con,"SELECT date AS date, SUM(`grandTotal`) AS income, SUM(`expenses`) AS expense, SUM(`wholeTotal`) AS wholePrice
                    FROM sales WHERE date BETWEEN '$startDate' AND '$endDate'
                    UNION
                    SELECT date AS date, SUM(`income`) AS income, SUM(`budget`) AS expense, SUM(`wholeTotal`) AS wholePrice
                    FROM expenses WHERE date BETWEEN '$startDate' AND '$endDate'");
                  }else{
                    $query = mysqli_query($con,"SELECT SUM(`grandTotal`) AS income, SUM(`expenses`) AS expense, SUM(`wholeTotal`) AS wholePrice
                    FROM sales
                    UNION
                    SELECT SUM(`income`) AS income, SUM(`budget`) AS expense, SUM(`wholeTotal`) AS wholePrice
                    FROM expenses");
                  }

                  $x = 1;
                  $income = 0;
                  $wholePrice = 0;
                  $expenses = 0;
                  $profit = 0;
                  while($result = mysqli_fetch_array($query)){
                   
                    $income += $result['income'];
                    $expenses += $result['expense'];
                    $wholePrice += $result['wholePrice'];

                    
                    $x++;
                  }
                  $profit = ($income - $wholePrice - $expenses);
                  echo "<tr>
                            <td>".$income."</td>
                            <td>".$expenses."</td>
                            <td>".$profit."</td>
                    </tr>";
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </section>

<?php
include_once("templates/footer.php");
?>
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
            <h1 class="m-0 text-dark">Repairing</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Repairing</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Repairing</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="add_repairing_form" action="includes/add_repairing_process.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="customer">Customer Name</label>
                            <select class="form-control form-control-sm" name="customer" id="customer">
                            <option value="">Select</option>
                            <?php

                                $query = "SELECT * FROM `customers` ORDER BY id DESC";
                                $Result = $con->query($query);
                                if($Result->num_rows > 0){
                                    while($row = $Result->fetch_assoc()){
                                        echo '<option value="'.$row['custId'].'">'.$row['name'].'</option>';
                                    }
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control form-control-sm" id="title" name="title" placeholder="Enter Title" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <input type="text" class="form-control form-control-sm" id="desc" name="desc" placeholder="Enter Description" required>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="grandTotal">Total</label>
                            <input type="number" class="form-control form-control-sm" id="grandTotal" name="grandTotal" placeholder="Enter Grand Total" required>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="paid">Paid</label>
                            <input type="number" class="form-control form-control-sm" id="paid" name="paid" placeholder="Enter Paid Amount" required>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="budget">Expense</label>
                            <input type="number" class="form-control form-control-sm" id="budget" name="budget" placeholder="Enter Budget Amount" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="expDate">Expiry Date</label>
                            <input type="date" class="form-control form-control-sm" id="expDate" name="expDate" placeholder="Enter Expiry Date" required>
                        </div>
                    </div>
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            
            <!-- /.card -->
        </div>
        <!-- 2nd column... -->
        <div class="col-md-12">
          
    <!-- DataTable... -->
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Manage Repairings</h3>
            </div>
            <!-- /.card-header -->

              <br>
              <table id="example1" class="table table-bordered table-striped" style="text-align:center;">
                <thead>
                <tr>
                  <th style="width:10px;">Sr.</th>
                  <th>Date</th>
                  <th>Invoice ID</th>
                  <th>Customer</th>
                  <th>Grand Total</th>
                  <th>Paid</th>
                  <th>Balance</th>
                  <th>Expiry</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 

                    $query = mysqli_query($con,"SELECT * FROM sales WHERE cat = 'repairing' ORDER BY id DESC");

                  $x = 1;
                  include_once('database/connection.php');
                  while($result = mysqli_fetch_array($query)){
                    $id = $result['id'];
                    $button = '<div class="dropdown">
                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Action 
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a href="includes/repair_invoice.php?&id='.$id.'" type="button" name="id" class="dropdown-item"> <i class="fa fa-print"></i> Print Invoice </a>
                        <a href="#?&id='.$id.'" type="button" name="id" onclick="recieve_payment('.$id.')" class="dropdown-item" data-toggle="modal" data-target="#recieve_payment_modal"> <i class="fa fa-money-check-alt"></i> Recieve Payment </a> 
                        <a href="#?&id='.$id.'" type="button" name="id" onclick="delete_repair_record('.$id.')" class="dropdown-item" data-toggle="modal" data-target="#delete_repair_record_modal"> <i class="fa fa-trash"></i> Delete </a> 
                      </div>
                    </div>';

                   // select cutomer name 
                   $customer = $result['customerId'];
                   $customerQuery = "SELECT `name` FROM `customers` WHERE custId = '$customer'";
                   $fetchCustomer = $con->query($customerQuery);
                   $result_row = $fetchCustomer->fetch_array();
                   $name = $result_row[0];

                   // select payments 
                   $saleId = $result['saleId'];
                   $totalPayments = 0;
                   $paymentQuery = mysqli_query($con,"SELECT * FROM `payments` WHERE invoiceId = '$saleId'");
                   while($fetchPaymentsResult = mysqli_fetch_array($paymentQuery)){
                       $myPayments = $fetchPaymentsResult['payment'];
                       $totalPayments += $myPayments;
                   }
                   if($totalPayments == ""){
                       $totalPayments = 0;
                   }

                   $previousPayment = $result['paid'];
                   $finalPayment = $previousPayment + $totalPayments;


                    echo "<tr>
                            <td>".$x."</td>
                            <td>".$result['date']."</td>
                            <td>".$result['saleId']."</td>
                            <td>".$name."</td>
                            <td>".$result['grandTotal']."</td>
                            <td>".$finalPayment."</td>
                            <td>".$result['balance']."</td>
                            <td>".$result['expDate']."</td>
                            <td>".$button."</td>
                    </tr>";
                    $x++;
                  }
                ?>
                </tbody>
              </table>
            </div>
        </div>
        </div>
        </div>
    </div>
</div>
</section>


<!-- Delete gold pathor modal... -->
<div class="modal fade" id="delete_repair_record_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><li class="fas fa-times-circle"></li> Are you sure you want to delete this expense?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <form id="delete_repair" action="includes/delete_repair_record_process.php" method="post">
          <input type="hidden" id="delete_repair_id" name="delete_repair_id">
      </div>
      <div class="card-body">
        <label for="pinCode">Confirmation PIN</label>   
        <input type="text" class="form-control form-control-sm" id="pinCode" name="pinCode" autocomplete="off" required>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-primary" id="updateButton">Yes</button>
        
      </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Recieve Payment... -->
<div class="modal fade" id="recieve_payment_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><li class="fas fa-money-check-alt"></li> Add Payment</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="recieve_payment" action="includes/recieve_payment_process.php" method="post" enctype="multipart/form-data">
      <!-- <form action="test.php" method="get"> -->
        <div class="card-body">
          <div class="form-group">
            <label for="paymentDate">Date</label>
            <input type="date" class="form-control" id="paymentDate" name="paymentDate" required>
            <input type="hidden" class="form-control" id="invoiceId" name="invoiceId">
          </div>
          <div class="form-group">
            <label for="newPayment">Payment</label>
            <input type="number" class="form-control" id="newPayment" name="newPayment" placeholder="Enter Recieved Payment" required>
          </div>
          <div class="form-group">
            <label for="extraNote">Extra Note</label>
            <input type="textarea" class="form-control" id="extraNote" name="extraNote" placeholder="Enter Extra Notes" required>
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-success">Recieve</button>
        </div>
      </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



<?php
include_once("templates/footer.php");
?>
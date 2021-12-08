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
            <h1 class="m-0 text-dark">Expenses</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Expenses</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <?php
$today = date('Y-m-d');
// $today = date('Y-m-d',strtotime("-1 days"));
$query = mysqli_query($con,"SELECT SUM(`paid`) AS budget FROM sales WHERE date = '$today'");
$row = mysqli_fetch_assoc($query); 
$paid = $row['budget'];
if($paid == ""){
  $paid = 0;
}

// recieved payments 
$query0 = mysqli_query($con,"SELECT SUM(`payment`) AS budget FROM payments WHERE date = '$today'");
$row0 = mysqli_fetch_assoc($query0); 
$paymemts = $row0['budget'];
if($paymemts == ""){
  $paymemts = 0;
}

// Expenses
$query1 = mysqli_query($con,"SELECT SUM(`budget`) AS budget FROM expenses WHERE date = '$today'");
$row1 = mysqli_fetch_assoc($query1); 
$expenses = $row1['budget'];
if($expenses == ""){
  $expenses = 0;
}

// Bank
$query2 = mysqli_query($con,"SELECT SUM(`amount`) AS budget FROM bank WHERE date = '$today'");
$row2 = mysqli_fetch_assoc($query2); 
$bank = $row2['budget'];
if($bank == ""){
  $bank = 0;
}

$fianlVal = (($paid + $paymemts) - ($bank + $expenses));
?>


<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Expense</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="add_expense_form" action="includes/add_expense_process.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="date">Date</label>
                    <input type="text" class="form-control form-control-sm" id="date" name="date" value="<?php echo $today; ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control form-control-sm" id="title" name="title" placeholder="Enter Title" required>
                  </div>
                  <div class="form-group">
                    <label for="desc">Description</label>
                    <textarea type="text" class="form-control form-control-sm" id="desc" name="desc" placeholder="Enter Description" required></textarea>
                  </div>
                  <div class="form-group">
                    <label for="budget">Amount</label>
                    <input type="number" class="form-control form-control-sm" id="budget" name="budget" min="0" max="<?php echo $sum; ?>" placeholder="Enter Amount of Expence" required>
                    <small style="color:red;">You can select upto <?php echo $fianlVal; ?> Rs.</small>
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
        <div class="col-md-8">
          
    <!-- DataTable... -->
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Manage Expenses</h3>
            </div>
            <!-- /.card-header -->

              <br>
              <table id="example1" class="table table-bordered table-striped" style="text-align:center;">
                <thead>
                <tr>
                  <th style="width:10px;">Sr.</th>
                  <th>Date</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Amount</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 

                    $query = mysqli_query($con,"SELECT * FROM expenses ORDER BY id DESC");

                  $x = 1;
                  include_once('database/connection.php');
                  while($result = mysqli_fetch_array($query)){
                    $id = $result['id'];
                    
                    $button = '<button type="button" class="btn btn-danger" onclick="delete_expense('.$id.')" data-toggle="modal" data-target="#delete_expense_modal">Delete</button>';
                   
                    echo "<tr>
                            <td>".$x."</td>
                            <td>".$result['date']."</td>
                            <td>".$result['title']."</td>
                            <td>".$result['description']."</td>
                            <td>".$result['budget']."</td>
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
</section>


<!-- Delete gold pathor modal... -->
<div class="modal fade" id="delete_expense_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><li class="fas fa-times-circle"></li> Are you sure you want to delete this expense?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <form id="delete_expense" action="includes/delete_expense_process.php" method="post">
          <input type="hidden" id="delete_expense_id" name="delete_expense_id">
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


<!-- update expense... -->
<div class="modal fade" id="edit_expense_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Update Expense Record</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit_expense_form" action="includes/update_expense_process.php" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label for="edit_date">Date</label>
                <input type="date" class="form-control form-control-sm" id="edit_date" name="edit_date" required>
                <input type="hidden" id="edit_id" name="edit_id">
            </div>
            <div class="form-group">
                <label for="edit_title">Title</label>
                <input type="text" class="form-control form-control-sm" id="edit_title" name="edit_title" placeholder="Enter Title" required>
            </div>
            <div class="form-group">
                <label for="edit_desc">Description</label>
                <textarea type="text" class="form-control form-control-sm" id="edit_desc" name="edit_desc" placeholder="Enter Description" required></textarea>
            </div>
            <div class="form-group">
                <label for="edit_budget">Amount</label>
                <input type="number" class="form-control form-control-sm" id="edit_budget" name="edit_budget" placeholder="Enter Budget of Expence" required>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
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
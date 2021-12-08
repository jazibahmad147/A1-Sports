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
            <h1 class="m-0 text-dark">Customers</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Customers</li>
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
          <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Customer</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="add_customer_form" action="includes/add_customer_process.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="customerName">Customer Name</label>
                    <input type="text" class="form-control form-control-sm" id="customerName" name="customerName" placeholder="Enter Customer Name" required>
                  </div>
                  <div class="form-group">
                    <label for="customerPhone">Customer Phone</label>
                    <input type="text" class="form-control form-control-sm" id="customerPhone" name="customerPhone" placeholder="Enter Customer Phone">
                  </div>
                  <div class="form-group">
                    <label for="customerAddress">Customer Address</label>
                    <input type="text" class="form-control form-control-sm" id="customerAddress" name="customerAddress" placeholder="Enter Customer Address">
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
              <h3 class="card-title">Manage Customers</h3>
            </div>
            <!-- /.card-header -->

              <br>
              <table id="example1" class="table table-bordered table-striped" style="text-align:center;">
                <thead>
                <tr>
                  <th style="width:10px;">Sr.</th>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 

                    $query = mysqli_query($con,"SELECT * FROM customers ORDER BY id DESC");

                  $x = 1;
                  include_once('database/connection.php');
                  while($result = mysqli_fetch_array($query)){
                    $id = $result['id'];
                    $button = '<div class="dropdown">
                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Action 
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a href="#?&id='.$id.'" type="button" name="id" onclick="edit_customer('.$id.')" class="dropdown-item" data-toggle="modal" data-target="#edit_customer_modal"> <i class="fa fa-edit"></i> Edit </a> 
                        <a href="#?&id='.$id.'" type="button" name="id" onclick="delete_customer('.$id.')" class="dropdown-item" data-toggle="modal" data-target="#delete_customer_modal"> <i class="fa fa-trash"></i> Delete </a>
                      </div>
                    </div>';
                   
                    echo "<tr>
                            <td>".$x."</td>
                            <td>".$result['custId']."</td>
                            <td>".$result['name']."</td>
                            <td>".$result['phone']."</td>
                            <td>".$result['address']."</td>
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
<div class="modal fade" id="delete_customer_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><li class="fas fa-times-circle"></li> Are you sure you want to delete this customer?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <form id="delete_customer" action="includes/delete_customer_process.php" method="post">
          <input type="hidden" id="delete_customer_id" name="delete_customer_id">
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


<!-- update customer... -->
<div class="modal fade" id="edit_customer_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Update Customer Record</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit_customer_form" action="includes/update_customer_process.php" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
            <label for="editCustomerName">Customer Name</label>
            <input type="text" class="form-control form-control-sm" id="editCustomerName" name="editCustomerName" placeholder="Enter Customer Name" required>
            <input type="hidden" id="editCustomerId" name="editCustomerId">
            </div>
            <div class="form-group">
            <label for="editCustomerPhone">Customer Phone</label>
            <input type="text" class="form-control form-control-sm" id="editCustomerPhone" name="editCustomerPhone" placeholder="Enter Customer Phone">
            </div>
            <div class="form-group">
            <label for="editCustomerAddress">Customer Address</label>
            <input type="text" class="form-control form-control-sm" id="editCustomerAddress" name="editCustomerAddress" placeholder="Enter Customer Address">
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
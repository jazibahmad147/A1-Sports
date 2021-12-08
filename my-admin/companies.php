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
            <h1 class="m-0 text-dark">Companies</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Companies</li>
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
                <h3 class="card-title">Add Company</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="add_company_form" action="includes/add_company_process.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="companyName">Company Name</label>
                    <input type="text" class="form-control form-control-sm" id="companyName" name="companyName" placeholder="Enter Company Name" required>
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
              <h3 class="card-title">Manage Companies</h3>
            </div>
            <!-- /.card-header -->

              <br>
              <table id="example1" class="table table-bordered table-striped" style="text-align:center;">
                <thead>
                <tr>
                  <th style="width:20px;">Sr.</th>
                  <th>Company Name</th>
                  <th style="width:100px">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 

                    $query = mysqli_query($con,"SELECT * FROM companies ORDER BY id DESC");

                  $x = 1;
                  include_once('database/connection.php');
                  while($result = mysqli_fetch_array($query)){
                    $id = $result['id'];
                    $button = '<button type="button" class="btn btn-danger" onclick="delete_company('.$id.')" data-toggle="modal" data-target="#delete_company_modal">Delete</button>';
                   
                    echo "<tr>
                            <td>".$x."</td>
                            <td>".$result['name']."</td>
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
<div class="modal fade" id="delete_company_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><li class="fas fa-times-circle"></li> Are you sure you want to delete this company?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <form id="delete_company" action="includes/delete_company_process.php" method="post">
          <input type="hidden" id="delete_company_id" name="delete_company_id">
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



<?php
include_once("templates/footer.php");
?>
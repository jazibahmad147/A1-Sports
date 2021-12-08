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
            <h1 class="m-0 text-dark">Stock</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Stock</li>
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
        <!-- 2nd column... -->
        <div class="col-md-12">
          
          <div class="card card-primary">
            <div class="card-header">
              <div class="card-title">Filter</div>
            </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <form action="" method="post">
                      <label for="category">Filter By Category</label>
                      <select name="category" class="form-control">
                        <option value="">SELECT</option>
                        <?php
                          $query = "SELECT * FROM `categories` ORDER BY id DESC";
                          $Result = $con->query($query);
                          if($Result->num_rows > 0){
                            while($row = $Result->fetch_assoc()){
                                echo '<option value="'.$row['catId'].'">'.$row['name'].'</option>';
                            }
                          }
                        ?>
                      </select><br>
                      <input type="submit" name="categorySubmit" class="btn btn-primary" value="Submit">
                    </form>
                  </div>
                  </div>
                  <!-- 2nd col  -->
                  <div class="col-md-6">
                  <div class="form-group">
                    <form action="" method="post">
                      <label for="company">Filter By Company</label>
                      <select name="company" class="form-control">
                        <option value="">SELECT</option>
                        <?php
                          $query = "SELECT * FROM `companies` ORDER BY id DESC";
                          $Result = $con->query($query);
                          if($Result->num_rows > 0){
                            while($row = $Result->fetch_assoc()){
                                echo '<option value="'.$row['compId'].'">'.$row['name'].'</option>';
                            }
                          }
                        ?>
                      </select><br>
                      <input type="submit" name="companySubmit" class="btn btn-primary" value="Submit">
                    </form>
                  </div>
                  </div>
                </div>
              </div>
          </div>

    <!-- DataTable... -->
        <div class="card card-primary">
          <form action="barcodes_slip.php" method="POST">
            <div class="card-header">
              <h3 class="card-title">Stock Table</h3>
              <input style="float:right;" type="submit" class="btn btn-warning" name="barcode_slip" value="Print Barcodes">
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              

              <br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Select</th>
                  <th>Sr.</th>
                  <th>Barcode</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Company</th>
                  <th>Qty</th>
				  <th>Whole Sale</th>
                  <th>Retail</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 

                  if(isset($_POST['categorySubmit'])){
                    $selectedCategory = $_POST['category'];
                    $query = mysqli_query($con,"SELECT * FROM stock WHERE category = '$selectedCategory' ORDER BY name ASC");
                  }else if(isset($_POST['companySubmit'])){
                    $selectedCompany = $_POST['company'];
                    $query = mysqli_query($con,"SELECT * FROM stock WHERE company = '$selectedCompany' ORDER BY name ASC");
                  }else{
                    $query = mysqli_query($con,"SELECT * FROM stock ORDER BY name ASC");
                  }
                  
                  $x = 1;
                  // include_once('database/connection.php');
                  while($result = mysqli_fetch_array($query)){
                    $id = $result['id'];
                    $button = '<div class="dropdown">
                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Action 
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a href="#?&id='.$id.'" type="button" name="id" onclick="print_barcode('.$id.')" class="dropdown-item" data-toggle="modal" data-target="#print_barcode_modal"> <i class="fa fa-print"></i> Print Barcode </a> 
                        <a href="#?&id='.$id.'" type="button" name="id" onclick="view_item('.$id.')" class="dropdown-item" data-toggle="modal" data-target="#view_item_modal"> <i class="fa fa-info-circle"></i> Detail Preview </a> 
                        <a href="#?&id='.$id.'" type="button" name="id" onclick="edit_item('.$id.')" class="dropdown-item" data-toggle="modal" data-target="#edit_item_modal"> <i class="fa fa-edit"></i> Edit Detail </a> 
                        <a href="#?&id='.$id.'" type="button" name="id" onclick="delete_item('.$id.')" class="dropdown-item" data-toggle="modal" data-target="#delete_item_modal"> <i class="fa fa-trash"></i> Delete Item </a>
                      </div>
                    </div>';

                    
                    $image_path = "media/stock/".$result['image'];
                    $image_name = $result['image'];

                    // Fetching Company Name 
                    $compId = $result['company'];
                    $fetchCompNameQuery = "SELECT `name` FROM `companies` WHERE compId = '$compId'";
                    $fetchCompNameResult = $con->query($fetchCompNameQuery);
                    $result_row = $fetchCompNameResult->fetch_array();
                    $compName = $result_row[0];

                    echo "<tr>
                            <td><input type='checkbox' class='form-control form-control-sm' name='selectCheckBox[]' value='".$result['itemId']."'></td>
                            <td>".$x."</td>
                            <td>".$result['itemId']."</td>
                            <td><img src='".$image_path."' width='50' onclick='view_item_image(".$id.")' data-toggle='modal' data-target='#view_item_image_modal'></td>
                            <td>".$result['name']."</td>
                            <td>".$compName."</td>
                            <td>".$result['qty']."</td>
							<td>".$result['wholeSalePrice']."</td>
                            <td>".$result['retailPrice']."</td>
                            <td>".$button."</td>
                    </tr>";
                    $x++;
                  }
                ?>
                </form>
                </tbody>
              </table>
            </div>
        </div>
        
    </div>
</div>
</section>


<!-- Delete gold pathor modal... -->
<div class="modal fade" id="delete_item_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><li class="fas fa-times-circle"></li> Are you sure you want to delete this item?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <form id="delete_stock_item" action="includes/delete_stock_item_process.php" method="post">
          <input type="hidden" id="delete_stock_id" name="delete_stock_id">
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

<!-- View Barcode OF Item Modal  -->
<div class="modal fade" id="print_barcode_modal">
  <div class="modal-dialog">
    <div class="modal-content"><div class="modal-header">
      <h5 class="modal-title"> Barcode</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <form id="" action="" method="post">
        <input type="hidden" id="barcode_id" name="barcode_id">
    </div>
    <div class="modal-body">
      <center><img id="barcodeId" src="" alt="barcode" width="150" height="100px"></center>
    </div>
    <!--/. modal body -->
    <div class="card-footer">
    <center><button type="button" id="printButton" onlick="location.href=''" class="btn btn-success"><li class="fas fa-print"> </li> Print </button></center>
    </form>
    </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- View Stock Item Image Modal  -->
<div class="modal fade" id="view_item_image_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <img id="imageId" src="" alt="" width="auto">
        <!--/. modal body -->
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- View Stock Item Modal  -->
<div class="modal fade" id="view_item_modal" style="text-align:center;">
  <div class="modal-dialog">
          
          <table class="table table-bordered table-striped" style="background-color:white; width:100%; text-align:center;">
            <tr>
              <th colspan="8"><h3 style="text-align:center;" class="modal-title" id="stock_item_name"></h3></th>
            </tr>
            <tr>
              <th>ID</th>
              <th>Date</th>
              <th>Company</th>
              <th>Description</th>
              <th>Qty</th>
              <th>Whole Sale Price</th>
              <th>Retail Price</th>
            </tr>
            <tr>
              <td id="stock_item_id"></td>
              <td id="stock_item_date"></td>
              <td id="stock_item_comp"></td>
              <td id="stock_item_desc"></td>
              <td id="stock_item_qty"></td>
              <td id="stock_item_wholeSalePrice"></td>
              <td id="stock_item_retailPrice"></td>
            </tr>
          </table>
        <!-- </div> -->
        <!--/. modal body -->
    </div>
    <!-- /.modal-content -->
  <!-- </div> -->
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



<!-- update gold stock item... -->
<div class="modal fade" id="edit_item_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Update Stock Item</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="update_stock_form" action="includes/update_stock_process.php" method="post" enctype="multipart/form-data">
        <div class="card-body"> 
          <div class="form-group">
            <label for="edi_date">Date</label>
            <input type="date" class="form-control form-control-sm" id="edit_date" name="edit_date" required>
            <input type="hidden" class="form-control form-control-sm" id="edit_id" name="edit_id">
            <input type="hidden" class="form-control form-control-sm" id="edit_item_id" name="edit_item_id">
          </div>
          <div class="form-group">
            <label for="edit_category">Item Category</label>
            <select class="form-control form-control-sm" name="edit_category" id="edit_category">
            <option value="">Select</option>
            <?php
              $query = "SELECT * FROM `categories` ORDER BY id DESC";
              $Result = $con->query($query);
              if($Result->num_rows > 0){
                while($row = $Result->fetch_assoc()){
                    echo '<option value="'.$row['catId'].'">'.$row['name'].'</option>';
                }
              }
            ?>
            </select>
          </div>
          <div class="form-group">
            <label for="edit_name">Item Name</label>
            <input type="text" class="form-control form-control-sm" id="edit_name" name="edit_name" placeholder="Enter Item Name" required>
          </div>
          <div class="form-group">
            <label for="edit_company">Item Company</label>
            <select class="form-control form-control-sm" name="edit_company" id="edit_company">
            <option value="">Select</option>
            <?php
              $query = "SELECT * FROM `companies` ORDER BY id DESC";
              $Result = $con->query($query);
              if($Result->num_rows > 0){
                while($row = $Result->fetch_assoc()){
                    echo '<option value="'.$row['compId'].'">'.$row['name'].'</option>';
                }
              }
            ?>
            </select>
          </div>
          <div class="form-group">
            <label for="edit_description">Item Description</label>
            <input type="text" class="form-control form-control-sm" id="edit_description" name="edit_description" placeholder="Enter Item Description" required>
          </div>
          <div class="form-group">
            <label for="edit_qty">Quantity</label>
            <input type="number" class="form-control form-control-sm" id="edit_qty" name="edit_qty" placeholder="Enter Quantity" required>
          </div>
          <div class="form-group">
            <label for="edit_whole_sale_price">Whole Sale Price</label>
            <input type="text" class="form-control form-control-sm" id="edit_whole_sale_price" name="edit_whole_sale_price" placeholder="Enter Whole Sale Price" required>
          </div>
          <div class="form-group">
            <label for="edit_retail_price">Retail Price</label>
            <input type="text" class="form-control form-control-sm" id="edit_retail_price" name="edit_retail_price" placeholder="Enter Retail Price" required>
          </div>
          <div class="form-group">
            <label for="edit_fileToUpload">Choose File</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="edit_fileToUpload" id="edit_fileToUpload">
                <!-- <label class="custom-file-label" for="exampleInputFile">Choose file</label> -->
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
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->




<?php
include_once("templates/footer.php");
?>
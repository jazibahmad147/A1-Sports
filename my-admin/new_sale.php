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
            <h1 class="m-0 text-dark">New Sale</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">New Sale</li>
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
            <div class="col-md-5">
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title"><li class="fas fa-info-circle"> </li> Product Detail</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="regDate">Registered Date</label>
                            <input type="text" name="regDate" id="regDate" class="form-control form-control-sm" disabled>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="productName">Name</label>
                                    <input type="text" name="productName" id="productName" class="form-control form-control-sm" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="productDesc">Description</label>
                                    <input type="text" name="productDesc" id="productDesc" class="form-control form-control-sm" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="productQuantity">Quantity</label>
                                    <input type="text" name="productQuantity" id="productQuantity" class="form-control form-control-sm" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="WholeSalePrice">Whole Sale</label>
                                    <input type="text" name="WholeSalePrice" id="WholeSalePrice" class="form-control form-control-sm" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="retailPrice">Retail</label>
                                    <input type="text" name="retailPrice" id="retailPrice" class="form-control form-control-sm" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><li class="fas fa-plus-circle"> </li> Products</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="container">
                            <div class="row row-cols-3">
                            <?php

                                // fetching products...
                                $query = "SELECT * FROM `stock`";
                                $Result = $con->query($query);
                                if($Result->num_rows > 0){
                                    while($row = $Result->fetch_assoc()){
                                        echo '<div class="col-4">
                                                <div class="card">
                                                    <img src="media/stock/'.$row['image'].'" alt="'.$row['name'].'" style="width:100%; height:100px">
                                                    <center>
                                                        <h5>'.$row['name'].'</h5>
                                                        <p class="price">'.$row['retailPrice'].'</p>
                                                    </center>
                                                </div>
                                            </div>';
                                    }
                                }

                                
                            ?>
                                
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <!-- <div class="card-footer">
                        ...
                    </div> -->
                </div>
                <!-- /.card -->
            </div>
            <!-- 2nd column... -->

            <!-- righ column -->
            <div class="col-md-7">
                <form id="order_form" action="includes/add_sale_process.php" method="post">
            
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><li class="fas fa-user"> </li> Select Customer</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            
                            <label for="customer">Customer Name</label>
                            <select class="form-control" name="customer" id="customer" required>
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
                </div>
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><li class="fas fa-cart-plus"> </li> Cart</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="col-md-12">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<div class="form-group">
											<input type="text" id="searchId" class="form-control form-control-sm" placeholder="Search Product" aria-label="" aria-describedby="basic-addon1" autofocus>
										</div>
										<div class="input-group-prepend">
											<button class="btn btn-outline-secondary" onclick="search_stock_item()" type="submit" hidden><li class="fas fa-search"></li></button>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="input-group mb-3">
                                        <input type="text" id="itemIdsearch" class="form-control form-control-sm">
                                        <input type="hidden" id="searchId2">
										<!-- <select class="form-control form-control-sm" id="searchId2">
											<option value="">Select</option> -->
											<?php

												// $query = "SELECT * FROM `stock` ORDER BY id DESC";
												// $Result = $con->query($query);
												// if($Result->num_rows > 0){
												// 	while($row = $Result->fetch_assoc()){
												// 		echo '<option value="'.$row['itemId'].'">'.$row['itemId'].' | '.$row['name'].'</option>';
												// 	}
												// }
											?>
										<!-- </select> -->
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary btn-sm" type="button" onclick="search_stock_item()">Add</button>
                                        </div>
									</div>
								</div>
							</div>
                        <div class="card">
                            <table class="table" 
                                <thead class="thead-dark">
                                <tr>
                                    <!-- <th scope="col">Sr.</th> -->
                                    <th scope="col">Name</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Total</th>
                                </tr>
                                </thead>
                                <tbody id="cartTable"></tbody>
                            </table>
                        </div>
                        <div class="card">
                            <h5 style="text-align:right; padding-right: 5px; ">Sub Total: <input type="text" class="form-control-sm" id="subTotal" name="subTotal" value="0" readonly></h5>
                            <hr>
                            <h5 style="text-align:right; padding-right: 5px;">Extra Charges: <input type="text" class="form-control-sm" id="etc" value="0" name="etc" onchange="calETC()"></h5>
                            <h5 style="text-align:right; padding-right: 5px;">Discount: <input type="text" class="form-control-sm" id="discount" value="0" name="discount" onchange="calDiscount()"></h5>
                            <hr>
                            <h5 style="text-align:right; padding-right: 5px;">Grand Total: <input type="text" class="form-control-sm" id="grandTotal" name="grandTotal" value="0" readonly></h5>
                            <h5 style="text-align:right; padding-right: 5px;">Paid: <input type="text" class="form-control-sm" id="paid" name="paid" value="0" onchange="calPaid()" required></h5>
                            <h5 style="text-align:right; padding-right: 5px;">Balance: <input type="text" class="form-control-sm" id="balance" name="balance" value="0" readonly></h5>
                            <hr>
                            <h5 style="text-align:right; padding-right: 5px;">Expiry Date: <input type="date" class="form-control-sm" id="expDate" name="expDate" value="<?php echo date('Y-m-d'); ?>"></h5>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <div class="row rows-col-2">
                            <div class="col-6">
                                <button type="button" class="btn btn-danger" onclick="window.location.reload()"><li class="fas fa-trash"> </li> Delete</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-success" style="float:right;"><li class="fas fa-save"></li> Save</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
                <!-- /.card -->
            </div> 
        </div>
    </div>
</section>



<!-- <script src="js/fetch_items_on_search.js"></script> -->

<?php
include_once("templates/footer.php");
?>

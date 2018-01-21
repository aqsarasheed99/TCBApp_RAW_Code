<?php  include_once 'session.php';?>
<?php    include_once ('header.php');  ?>
 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Product Record</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"> + Add Product
					</button>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
				   <div class="x_content"><br/>
				       <?php echo message();?>
                      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr >
                  <th align="center">Product Name</th>
				  <th align="center">Manufacturer</th>
				  <th align="center">Update</th>
				  <th align="center">Delete</th>
                </tr>
                </thead>
						<tbody>
						
						   <?php include_once 'product_CRUD.php';?>
							 <?php 
							   $conn = new crudOp();
							   $read = $conn->read();
							   while($fetch = $read->fetch_array()){
							 ?>
							 <tr>	
								<td align="center"><?php echo $fetch['product_name'];?>  </td>
								<td align="center"><?php echo $fetch['manufacturer'];?>  </td>
								
								<td align="center">
									<i class="glyphicon glyphicon-edit"  data-toggle="modal" data-target="#modalEdit"></i>
								</td>
								<?php 
									global $product_id;
									$product_id = $fetch['id'];
								?>
								<td align="center"><a href="delete_product.php?product_id=
									   <?php echo $product_id;?>" onclick="return Confirm('Are you sure?');"> 
									<i class="glyphicon glyphicon-remove-circle">
									</i></a>
								</td>
							</tr>
							
						<?php
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
        <!-- /page content -->
			
		<!--first model to insert new product -->
	 <div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
		  <!-- Modal content-->
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h3 class="modal-title" align="center">Add Product</h3>
			</div>
			<div class="modal-body">
						<form id="demo-form2" action="insert_product.php" data-parsley-validate class="form-horizontal form-label-left"
						method="POST">

						  <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"> Product Name <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							  <input type="text" name="product_name" id="product_name" required="required" class="form-control col-md-7 col-xs-12" placeholder="Product Name">
							</div>
						  </div>

						  <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"> Manufacturer <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							  <input type="text" name="manufacturer" id="manufacturer" required="required" class="form-control col-md-7 col-xs-12" placeholder="Enter Manufacturer">
							</div>
						  </div>
						  
						  <div class="ln_solid"></div>
						  
						  <div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
							  <button type="submit" class="btn btn-success">Submit</button>
							  <button class="btn btn-danger" type="button">Cancel</button>
							  <button class="btn btn-primary" type="reset">Reset</button>
							  
							</div>
						  </div>
						</form>
			</div>
		  </div>
		</div>
	  </div> 
	</div>
<!--model content close --> 

		 <?php
	    //update product against selected id
		   if(isset($_POST["submit"])){
		   $product_name = $_POST["product_name"];
		   $manufacturer = $_POST["manufacturer"];
		   $crud = new crudOp();
		   $crud->update($product_id,$product_name,$manufacturer);
		  }
	   ?> 
	 
<!--second model to edit product detail-->
	 <div class="modal fade" id="modalEdit" role="dialog">
		<div class="modal-dialog">
		  <!-- Modal content-->
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h3 class="modal-title" align="center">Update Product Detail</h3>
			</div>
			<div class="modal-body">
						<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
					method="POST">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Product Name <span class="required">*</span>
                        </label>
						   <?php
								// fetch data of selected product_id
								  $select = new crudOp();
								  $read = $select->fetch_selected_id($product_id); 
								  $fetch = $read->fetch_array();
						     ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="product_name" id="product_name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $fetch['product_name']; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Manufacturer <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="manufacturer" id="manufacturer" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $fetch['manufacturer']; ?>">
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						  <button type="submit" name="submit" value="submit" class="btn btn-success">Submit</button>
                          <button class="btn btn-danger" type="button">Cancel</button>
                          <button class="btn btn-primary" type="reset">Reset</button>
                          
                        </div>
                      </div>

                    </form>
			</div>
		  </div>
		</div>
	  </div> 
	</div>
<!--model content close --> 

<?php include_once ('footer.php'); ?>        
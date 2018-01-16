<?php include_once 'session.php';?>
<?php include_once ('header.php'); ?>
<?php include 'products_per_purchase_invoice_crud.php';?>
        <?php if(isset($_GET["id"])) 
			  {
			  $id =$_GET["id"] ;
			   }
		?>
		<?php
				//update distributor against selected id
				   if(isset($_POST["submit"])){
					   $product_id         = $_POST["product_id"];
					   $expiry_starting    = $_POST["expiry_starting_date"];
					   $expiry_ending      = $_POST["expiry_ending_date"];
					   $original_price     = $_POST["original_price"];
					   $discount_per_item  = $_POST["discount_per_item"];
					   $purchase_price     = $_POST["purchase_price"];
					   $sale_price         = $_POST["sale_price"];
					   $imei               = $_POST["imei"];
					   
				   $crud = new crudOp();
				   $crud->updateProductsPerPurchaseInvoice($id,$product_id,$expiry_starting,$expiry_ending,$original_price,$discount_per_item,$purchase_price,$sale_price,$imei);
				  }
	    ?> 
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Edit Product</h3>
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
				  <h2></h2>
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
                    </ul>
                    <div class="clearfix"></div>
                </div>
				<div class="x_content">
					  <!--form start -->
					<?php 
									   $conn = new crudop();
									   $read_data = $conn->displayPurchaseInvoiceData($id);
									   while($fetch_data = $read_data->fetch_array()){
									 ?>
					  
			<form  action="" method="post" class="form-horizontal form-label-left">
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-12"> Products Name <span class="required">*</span>
						</label>
							<div class="col-md-5 col-sm-5 col-xs-12">
								<select class="form-control">
										<?php 
													   $read = $conn-> readProducts();
													   while($fetch = $read->fetch_array()){
										?>
										<option	value="<?php echo $fetch["id"]; ?>">
													   <?php echo $fetch["product_name"]; ?>	
										</option>
										
										<?php } ?>
								</select>
						  </div>
					</div>
					<div class="form-group">
							<label class="control-label col-md-4 col-sm-4 col-xs-12">Expiry Starting Date <span class="required">*</span>
							</label>
							<div class="col-md-5 col-sm-5 col-xs-12">
								<input type="date"  class="form-control col-md-6" value="<?php echo $fetch_data["expiry_starting_date"]; ?>">
							</div>
					</div>					

					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-12">Expiry Ending Date <span class="required">*</span></label>
						<div class="col-md-5 col-sm-5 col-xs-12">
						<input type="date" class="form-control col-md-6" value="<?php echo $fetch_data["expiry_ending_date"]; ?>"	>
						</div>
					</div>
				  
					<div class="form-group">
							<label class="control-label col-md-4 col-sm-4 col-xs-12">Original Price<span class="required">*</span></label>
							<div class="col-md-5 col-sm-5 col-xs-12">
							 <input type="text" class="form-control col-md-7 col-xs-12" value="<?php echo $fetch_data["original_price"]; ?>">
							</div>
					 </div>
					 <div class="form-group">
							<label class="control-label col-md-4 col-sm-4 col-xs-12">Discount Per Item<span class="required">*</span></label>
							<div class="col-md-5 col-sm-5 col-xs-12">
							 <input type="text" class="form-control col-md-7 col-xs-12" value="<?php echo $fetch_data["discount_per_item"]; ?>">
							</div>
					 </div>
					 
					 <div class="form-group">
							<label class="control-label col-md-4 col-sm-4 col-xs-12">purchase Price<span class="required">*</span></label>
							<div class="col-md-5 col-sm-5 col-xs-12">
							 <input type="text" class="form-control col-md-7 col-xs-12" value="<?php echo $fetch_data["purchase_price"]; ?>">
							</div>
					 </div> 
					 <div class="form-group">
							<label class="control-label col-md-4 col-sm-4 col-xs-12">Sale Price<span class="required">*</span></label>
							<div class="col-md-5 col-sm-5 col-xs-12">
							 <input type="text" class="form-control col-md-7 col-xs-12" value="<?php echo $fetch_data["sale_price"]; ?>">
							</div>
					 </div>
					<div class="form-group">
							<label class="control-label col-md-4 col-sm-4 col-xs-12">IMEI <span class="required">*</span>
							</label>
							<div class="col-md-5 col-sm-5 col-xs-12">
								<input type="text"  class="form-control col-md-6" value="<?php echo $fetch_data["imei"]; ?>	">
							</div>
					</div>	
					<?php } ?>
						 
					<div class="form-group">
							<div class="col-md-5 col-sm-5 col-xs-12 col-md-offset-4"><br/>
								<input type="submit" name="submit" class="btn btn-success btn-md" id="submit"  value="Update"/>
								<input type="submit" name="submit" class="btn btn-danger btn-md" id="submit"  value="Cancel"/>
								<br>
							</div>
					</div>					  
            </form>								  
		</div>     
	</div>	
</div>
</div>
</div>
</div>
<?php include_once ('footer.php'); ?>        
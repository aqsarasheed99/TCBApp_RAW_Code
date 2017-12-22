<?php include_once ('header.php'); ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Products Per Invoice</h3>
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
                    <h2>Add Products Against Invoice</h2>
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
						
                  <!--Product per invoice form that display after the submit button -->
			<div class="col-md-12">
				<div class="box-body">
					<form id="productform"> 		
						<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<label class="control-label col-md-7 col-sm-6 col-xs-12"> Select Product Name <span class="required">*</span>
										</label>
											<select class="form-control" name="product_name" id="product_name">
											<?php include 'products_per_invoice_crud.php';?>
												<?php 
															   $connection = new crudop();
															   $read = $connection->read();
															   while($fetch = $read->fetch_array()){
															 ?>
												<option	value="<?php echo $fetch["id"]; ?>">
															   <?php echo $fetch["product_name"]; ?>	
												</option>
												<?php } ?>
											</select>
									</div>
									<div class="col-md-3">
										<label class="control-label col-md-8 col-sm-6 col-xs-12">Expiry Starting Date <span class="required">*</span>
										</label>
										<input type="date" name="expiry_starting" id="expiry_starting" required="required" class="form-control col-md-7 col-xs-12">									
									</div>
									<div class="col-md-3">
										<label class="control-label col-md-8 col-sm-6 col-xs-12">Expiry Ending Date <span class="required">*</span>
										</label>
										<input type="date" name="expiry_ending" id="expiry_ending" required="required" class="form-control col-md-7 col-xs-12">									
									</div>
									<div class="col-md-3">
										<label class="control-label col-md-6 col-sm-6 col-xs-12"> Purchase Price<span class="required">*</span>
										</label>
										<input type="text" name="purchase_price" id="purchase_price" placeholder="Purchase Price"required="required" class="form-control col-md-7 col-xs-12">
									</div>
									
								</div><br/>
								<!--first row close -->
								<div class="row">
									<div class="col-md-3">
										<label class="control-label col-md-6 col-sm-6 col-xs-12"> Sale Price<span class="required">*</span>
										</label>
										<input type="text" name="sale_price" id="sale_price" placeholder="Sale Price"required="required" class="form-control col-md-7 col-xs-12">
									</div>
									<div class="col-md-3">
										<label class="control-label col-md-6 col-sm-6 col-xs-12">IMEI<span class="required">*</span>
										</label>
										<input type="text" name="imei" id="imei" placeholder="IMEI"required="required" class="form-control col-md-7 col-xs-12">
									</div>	
								</div><br/>
								<!--second row close -->
								<div class="row">
									<div class="col-md-4">
										<button class="btn btn-danger" type="button">Cancel</button>
										<button class="btn btn-primary" type="reset">Reset</button>
										 <button type="submit" id="submit" class="btn btn-success">Submit</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
                    <!--product_per_invoice_form close -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<?php include_once ('footer.php'); ?>        
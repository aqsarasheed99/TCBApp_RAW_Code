<?php  include_once 'session.php';?>
<?php include_once ('header.php'); 
      include_once ('product_CRUD.php'); 
?>
	 <?php   if (isset($_GET["product_id"])) {
		        $product_id =$_GET["product_id"] ;
	           }
	 ?>
	 <?php
	    //update product against selected id
		   if(isset($_POST["submit"])){
		   $product_name = $_POST["product_name"];
		   $manufacturer = $_POST["manufacturer"];
		   $crud = new crudOp();
		   $crud->update($product_id,$product_name,$manufacturer);
		  }
		  
	   ?> 
	 
	    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Product</h3>
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
                    <h2>Update Product</h2>
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
        </div>
        <!-- /page content -->

<?php include_once ('footer.php'); ?>        
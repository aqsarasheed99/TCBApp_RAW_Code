<?php       include_once 'session.php';
            include_once ('header.php');
            include_once ('distributor_crud.php'); 
			?>
			 <?php  
     			 if (isset($_GET["distributor_id"])) {
		              $distributor_id =$_GET["distributor_id"] ;
	                   }
	          ?>
			  <?php
				//update distributor against selected id
				   if(isset($_POST["submit"])){
					   $name        = $_POST["name"];
					   $father_name = $_POST["father_name"];
					   $cnic        = $_POST["cnic"];
					   $phone_no    = $_POST["phone_no"];
					   $address     = $_POST["address"];
					   
				   $crud = new crudOp();
				   $crud->update($distributor_id,$name,$father_name,$cnic,$phone_no,$address);
				  }
	           ?> 

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Distributor</h3>
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
                    <h2>Update Distributor</h2>
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

                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Name <span class="required">*</span>
                        </label>
						<?php
								// fetch data of selected product_id
								  $select = new crudOp();
								  $read = $select->fetch_selected_id($distributor_id); 
								  $fetch = $read->fetch_array();
						     ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="name" id="name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $fetch["name"]?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Father Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="father_name" id="father_name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $fetch["father_name"]?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">CNIC</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="cnic" class="form-control" data-inputmask="'mask' : '99999-9999999-9'"value="<?php echo $fetch["cnic"]?>">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true" ></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Phone No.</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="phone_no" class="form-control"   data-inputmask="'mask' : '(+99)999-9999999'" value="<?php echo $fetch["phone_no"]?>">
                          <span class="fa fa-user form-control-feedback right"  aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Address<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control" name="address" rows="3"><?php echo $fetch["address"];?></textarea>
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
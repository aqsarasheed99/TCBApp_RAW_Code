 <?php include 'session.php' ?>
<?php include_once ('header.php'); ?>
 <?php include 'stock_management_crud.php';?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Available Stock</h3>
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
					<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr >
						    <th>Purchase Invoice Id</th>
						    <th>Products Name</th>
						    <th>Expiry Starting Date</th>
						    <th>Expiry Ending Date</th>
						    <th>Sale Price</th>
						    <th>Status</th>
						    <th>IMEI</th>
						</tr>
                      </thead>
                      <tbody>
							 <?php 
							   $conn = new crudop();
							   $read = $conn->availableStock();
							   while($fetch = $read->fetch_array()){
							 ?>
							<tr>	
								<td align="center"><?php echo $fetch['purchase_invoice_id'];?></td>
							    <td align="center"><?php echo $fetch['product_name'];?>	</td>
							    <td align="center"><?php echo $fetch['expiry_starting_date'];?>	</td>
							    <td align="center"><?php echo $fetch['expiry_ending_date'];?>	</td>
							    <td align="center"><?php echo $fetch['sale_price'];?>	</td>
							    <td align="center"><?php echo $fetch['status'];?>	</td>
							    <td align="center"><?php echo $fetch['imei'];?>	</td>
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
<?php include_once ('footer.php'); ?>        
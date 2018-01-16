 <?php include 'session.php' ?>
<?php include_once ('header.php'); ?>
 <?php include 'purchase_invoice_crud.php';?>

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
						  <th>Invoice Id</th>
						  <th>Distributor Name</th>
						  <th>Date</th>
						  <th>Comment</th>
						  <th>Net Total Of Products</th>
						  <th>Discount Of Products</th>
						  <th>Discount Of Invoice</th>
						  <th>Net Discount</th>
						  <th>Amount Paid</th>
						  <th>Amount Payable</th>
						  <th>Balance</th>
						  <th>Update</th>
						  <th>Remove</th>
						</tr>
                      </thead>
                      <tbody>
                         <?php include_once 'purchase_invoice_crud.php';?>
							 <?php 
							   $conn = new crudop();
							   $read = $conn->read();
							   while($fetch = $read->fetch_array()){
							 ?>
							<tr>	
								<td align="center"><a href= "products_per_purchase_invoice.php?invoice_id=<?php echo $fetch['id']?>">Invoice:
								<?php echo $fetch['id'];?>
								</a>						
								</td>
								<td align="center"><?php echo $fetch['name'];?></td>
							    <td align="center"><?php echo $fetch['date'];?>	</td>
							    <td align="center"><?php echo $fetch['comment'];?>	</td>
							    <td align="center"><?php echo $fetch['net_total_of_products'];?>	</td>
							    <td align="center"><?php echo $fetch['products_discount'];?>	</td>
							    <td align="center"><?php echo $fetch['discount_of_invoice'];?>	</td>
							    <td align="center"><?php echo $fetch['net_discount'];?>	</td>
							    <td align="center"><?php echo $fetch['net_total'];?>	</td>
							    <td align="center"><?php echo $fetch['amount_paid'];?>	</td>
							    <td align="center"><?php echo $fetch['amount_payable'];?>	</td>
								<td align="center">
									<a href="edit_department.php?department_id=<?php echo $fetch['id'];?>" >
										<i class="glyphicon glyphicon-edit"></i> 
										</a>
									</td>
								<td align="center">
									<a href="delete_department.php?department_id=<?php echo $fetch['id'];?>" onclick="return Confirm('Are you sure?'); ">
										<i class="glyphicon glyphicon-remove-circle"></i>
									</a>
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
<?php include_once ('footer.php'); ?>        
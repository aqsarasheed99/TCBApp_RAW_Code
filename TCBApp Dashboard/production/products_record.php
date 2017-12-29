<?php       include_once 'session.php';
            include_once ('header.php'); 
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
                    <h2>Product Record</h2>
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
                      <table id="example1" class="table table-bordered table-striped">
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
						<td align="center"><a href="edit_product.php?product_id=<?php echo $fetch['id'];?>">
							<i class="glyphicon glyphicon-edit"></i></a> </td>
					    <td align="center"><a href="delete_product.php?product_id=
						       <?php echo $fetch['id'];?>" onclick="return Confirm('Are you sure?');"> 
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

<?php include_once ('footer.php'); ?>        
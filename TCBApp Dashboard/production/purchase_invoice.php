<?php include_once ('header.php'); ?>
<?php include_once "db_connection.php" ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Purchase Invoice</h3>
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
                    <h2>Add Invoice</h2>
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
					<div class="col-md-12">
					<div class="box-body">
					<form id="demo-form2"> 		
						<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<label class="control-label col-md-7 col-sm-6 col-xs-12"> Distributors Name <span class="required">*</span>
                                        </label>
										<select class="form-control" name="distributer_id" id="distributer_id">
											 <?php include 'purchase_invoice_crud.php';?>
												<?php 
															   $connection = new crudop();
															   $read = $connection->read();
															   while($fetch = $read->fetch_array()){
															 ?>
												<option	value="<?php echo $fetch["id"]; ?>">
															   <?php echo $fetch["name"]; ?>	
												</option>
												<?php } ?>
										</select>
									</div>
									<div class="col-md-3">
										<label class="control-label col-md-6 col-sm-6 col-xs-12">Date <span class="required">*</span>
                                        </label>
										<input type="date" name="date" id="date" required="required" class="form-control col-md-7 col-xs-12">
									</div>
									<div class="col-md-3">
										<label class="control-label col-md-6 col-sm-6 col-xs-12"> Amount Paid <span class="required">*</span>
                                        </label>
										 <input type="text" name="amount_paid" id="amount_paid" placeholder="Amount Paid"required="required" class="form-control col-md-7 col-xs-12">
									</div>
									<div class="col-md-3">
									    <label class="control-label col-md-6 col-sm-6 col-xs-12"> Amount Payable <span class="required">*</span>
                                        </label>
										<input type="text" name="amount_payable" id="amount_payable" placeholder="Amount Payable"required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div><br/>
								<!--first row close -->
								<div class="row">
									<div class="col-md-3">
										<label class="control-label col-md-8 col-sm-6 col-xs-12"> Discount Receieved <span class="required">*</span>
                                        </label>
										<input type="text" name="discount_received" id="discount_received" placeholder="Discount Received"  required="required" class="form-control col-md-7 col-xs-12">
									</div>
									<div class="col-md-3">
										<label class="control-label col-md-6 col-sm-6 col-xs-12">Net Total <span class="required">*</span>
                                        </label>
										<input type="text" name="net_total" id="net_total" placeholder="Net Total" required="required" class="form-control col-md-7 col-xs-12">
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
		    </div>
		</div>
	</div>
</div>
</div>
</div>

        <!-- /page content -->
		<!--javascript code-->
		<script>
		 //jquery show function that print the form 
		   $("#submit").click(function(){
				$("#productform").show();
			});
			//variable declare invoice_id 
			let invoiceId;
			let val;
		//Ajax code to send data to php page
		$('#submit').click(function(event){
			//variable declaration
			let disributerId, date, amountPaid, amountPayable, discountReceived, netTotal;
				
				//get values from form and store in javascript variables
					distributerId    = document.getElementById("distributer_id").value;
					date             = document.getElementById("date").value;
					amountPaid       = document.getElementById("amount_paid").value;
					amountPayable    = document.getElementById("amount_payable").value;
					discountReceived = document.getElementById("discount_received").value;
					netTotal		 = document.getElementById("net_total").value;
					
					// this function is used to send data without page reloade
					event.preventDefault();
					$.ajax({
					url: "purchase_invoice_insert.php",
					method: "POST",
					data:{distributerId:distributerId, date:date, amountPaid:amountPaid,amountPayable:amountPayable,
					       discountReceived:discountReceived, netTotal:netTotal},
					})
					//after success 
				  // .done(function( data ) {
					  // //parseJSON convert the string data into javascript object
					  // //"data" include all the data that we recieve
						// let json = JSON.stringify(eval('(' + data + ')'));					  
							// data = $.parseJSON(json);
					  
						  // //we get the invoice id from the object(data)
						   // invoiceId = data.id;			
						  // //insert the coulmn against the row
						// document.getElementById('displayInvoiceId').innerHTML= "Purchase Invoice Id:" + invoiceId;
				  // });
				 }); // click event

		</script>
<?php include_once ('footer.php'); ?>        
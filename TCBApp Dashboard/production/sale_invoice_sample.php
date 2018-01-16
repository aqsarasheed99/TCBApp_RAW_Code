 <?php include 'session.php' ?>
<?php include_once ('header.php'); ?>
 <?php include 'purchase_invoice_crud.php';?>
	
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Sale Invoice</h3>
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
						<div class="form-group">
                        <label class="control-label col-md-1 col-sm-1 col-xs-12">IMEI NO:<span class="required"></span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <input type="number" name="imei" id="imei" class="form-control col-md-7 col-xs-12">
                        </div> 
						</div>
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
					<div id="display_form">
						<table id="myTableData" id="datatable-responsive"  class="table table-striped " cellspacing="0" width="100%">
								
									<tr>
									  <th>Invoice Id</th>
									  <th>Products Name</th>
									  <th>Expiry Starting</th>
									  <th>Expiry Ending</th>
									  <th>Sale Price</th>
									  <th>Status</th>
									  <th>IMEI NO </th>
									  <th>Discount</th>
									  <th>Delete</th>
									</tr>
						</table>	
						
				    </div><!--form div close  -->
				
			</div>     
			</div>	
		</div>
	</div>
</div>
</div>
<script>
						
				var imeiNo;
			 //array declaration 
				let purchaseInvoiceIdArr = new Array();
				let productIdArr = new Array();
				let expStartingArr = new Array();
				let expEndingArr = new Array();
				let salePriceArr = new Array();
				let statusArr = new Array();
				let imeiArr = new Array();
				let discountArr = new Array();
				
			$('#imei').change(function(event){
				//get all input value in variable 
				 imeiNo = document.getElementById('imei').value;
				
				// this function is used to send data without page reloade
					event.preventDefault();
				
				$.ajax({
				    method:"POST",
				    url:"sale_invoice_form.php",
				    //take a imei number from user and send this data through ajax request
				    data:{imei_no:imeiNo},
					dataType:'text',
					success:function(data) 
					{
						$("#myTableData").append(data);
						
					//let json = JSON.stringify(eval('(' + data + ')'));					  
						//data = $.parseJSON(json);
					   
					    purchaseInvoiceId = data.purchase_invoice_id;
					    productId         = data.product_name;
					    expiryStarting    = data.expiry_starting_date;
					    expiryEnding      = data.expiry_ending_date;
					    salePrice         = data.sale_price;
					    status            = data.status;
					    imeiVal           = data.imei;
						
					  //push data into array
						purchaseInvoiceIdArr.push(purchaseInvoiceId);
						productIdArr.push(productId);
						expStartingArr.push(expiryStarting);
						expEndingArr.push(expiryEnding);
						salePriceArr.push(salePrice);
						statusArr.push(status);
						imeiArr.push(imeiVal);
						
						document.getElementById("imei").value = "";
						//document.getElementById('myTableData').innerHTML=purchaseInvoiceId;
							
					}
				})
			});
	</script>
<?php include_once ('footer.php'); ?>        
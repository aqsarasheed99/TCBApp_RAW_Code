<?php include 'session.php' ?>
<?php include_once ('header.php'); ?>
<?php include 'products_per_purchase_invoice_crud.php';?> 
 
        <?php if (isset($_GET["invoice_id"])) 
			  {
			  $invoice_id =$_GET["invoice_id"] ;
			   }
		?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Products Against Invoice Record</h3>
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
				  <!--button for add new invoice -->
				  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">+ Add Products</button>
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
				    
					<?php echo message();?>
                    
					<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr >
						  <th>Purchase Invoice Id</th>
						  <th>Products Name</th>
						  <th>Expiry Starting Date</th>
						  <th>Expiry Ending Date</th>
						  <th>Original Price</th>
						  <th>Discount Per Item</th>
						  <th>Purchase price</th>
						  <th>Sale Price</th>
						  <th>IMEI</th>
						  <th>Update</th>
						  <th>Remove</th>
						</tr>
                      </thead>
                      <tbody>
                         <?php 
							   $conn = new crudop();
							   $read = $conn->readProductsPerInvoice($invoice_id);
							   while($fetch = $read->fetch_array()){
							 ?>
							<tr>	
								<td align="center">
								<?php echo $fetch['purchase_invoice_id'];?>					
								</td>
								<td align="center"><?php echo $fetch['product_name'];?>                   						
								</td>
								<td align="center"><?php echo $fetch['expiry_starting_date'];?>						
								</td>
								<td align="center"><?php echo $fetch['expiry_ending_date'];?>						
								</td>
								<td align="center"><?php echo $fetch['original_price'];?>						
								</td>
								<td align="center"><?php echo $fetch['discount_per_item'];?>						
								</td>
								<td align="center"><?php echo $fetch['purchase_price'];?>						
								</td>
								<td align="center"><?php echo $fetch['sale_price'];?>						
								</td>
								<td align="center"><?php echo $fetch['imei'];?>						
								</td>
								<td align="center">
									<a href="edit_products_per_purchase_invoice.php?purchase_invoice_id = <?php echo $invoice_id; ?>">
										<i class="glyphicon glyphicon-edit"></i> 
										</a>
								</td>
						
								<td align="center">
									<a href="delete_department.php?department_id=<?php echo $fetch['id'];?>">
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
 <!-- Modal content-->
  <div class="modal fade" id="myModal" role="dialog" >
    <div class="modal-dialog" style=" width: 950px;margin: auto;">
      <div class="modal-content">
        <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h3 class="modal-title" align="center">Add Products</h3>
        </div>
			<div class="modal-body" >
			 <form  action="" method="post" class="form-horizontal form-label-left">
                <div class="form-group">
					<label class="control-label col-md-4 col-sm-4 col-xs-12"> Products Name <span class="required">*</span>
					</label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
							<select class="form-control" name="product_name" id="product_name">
								<?php 
								  $connection = new crudop();
								  $read = $connection-> readProducts();
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
                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <input type="date" name="expiry_starting" id="expiry_starting_date" placeholder="Expiry Starting Date" required="required" class="form-control col-md-6">
                        </div>
                </div>					

			    <div class="form-group">
				    <label class="control-label col-md-4 col-sm-4 col-xs-12">Expiry Ending Date <span class="required">*</span></label>
					<div class="col-md-7 col-sm-7 col-xs-12">
					<input type="date" name="expiry_ending" id="expiry_ending_date" placeholder="Expiry Ending Date" required="required" class="form-control col-md-6">
					</div>
			    </div>
				<div class="form-group">
				    <label class="control-label col-md-4 col-sm-4 col-xs-12"> Original Price <span class="required">*</span></label>
					<div class="col-md-7 col-sm-7 col-xs-12">
					<input type="text" name="original_price" id="original_price" placeholder="Original Price" required="required" class="form-control col-md-6">
					</div>
			    </div>
				<div class="form-group">
				    <label class="control-label col-md-4 col-sm-4 col-xs-12"> Discount <span class="required">*</span></label>
					<div class="col-md-7 col-sm-7 col-xs-12">
					  
					  <input type="text" name="discount" id="discount" placeholder="Discount" required="required"class="form-control col-md-6 col-xs-12">  
					 
					 <input type="radio" name="discountType" id="percentage" onchange="getPurchasePrice();readOnlyPurchasePrice();"  
					  required="required" value="percentage" >By Percentage
					
					 <input type="radio" name="discountType" id="amount" onchange="getPurchasePrice();readOnlyPurchasePrice();" 
					  required="required" value="amount"> By Amount					  
					</div>
					   
			    </div>
				 <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Purchase Price<span class="required">*</span></label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                         <input type="text" name="purchase_price" id="purchase_price" placeholder="Purchase Price"  readonly="true"
						 required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                 </div>
				 
				 <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Sale Price<span class="required">*</span></label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                         <input type="text" name="sale_price" id="sale_price" placeholder="Sale Price"required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                 </div>
				<div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">IMEI <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <input type="number" maxlength="15" name="imei" id="imei" value= "" onchange="imeiFunction();"
							       placeholder="IMEI" required="required"  class="form-control col-md-6">
                        </div>
                </div>				
                <div class="form-group">
                        <div class="col-md-5 col-sm-5 col-xs-12 col-md-offset-4"><br/>
							<button  id="table_heading" class="btn btn-success btn-md" onclick="insert();"> Display </button>
							<input type="button" name="submit" class="btn btn-success btn-md" id="submit"  value="Submit" onclick="objVariables();"/>
						    <br>
                        </div>
                </div>					  
            </form>
			<!-- table start that print the headings and the remaining part of table are defined in the end of this page -->
		<div id="mydata">
			<table  id="myTableData" class="table table-striped table-bordered dt-responsive nowrap" align ="center" width="70%">
				<tr>
					<th> Index No              </th>
					<th> Product Name          </th>
					<th> Expiry Starting       </th>
					<th> Expiry Ending         </th>
					<th> Original Price        </th>
					<th> Discount              </th>
					<th> Purchase Price        </th>
					<th> Selling Price         </th>
					<th> IMEI                  </th>
				</tr>
			</table>
			<br/>
		</div>
		<script>
			//this method print the table heading
			$("#table_heading").click(function(){
				$("#mydata").show();
			});
			
			let val;
			let purchaseInvoiceId;
			
			purchaseInvoiceId = <?php echo $invoice_id ;?>
			       
			//product_per_invoice code
			//Arrays are declare
			let productIdArr = new Array();
			let expStartingArr = new Array();
			let expEndingArr = new Array();
			let originalPriceArr = new Array();
			let discountArr = new Array();
			let purchasePriceArr = new Array();
			let salePriceArr = new Array();
			let imeiArr = new Array();
			
		    let productName, expStarting, expEnding,originalPrice,discount, purchasePrice, salePrice, imei, 
			     netTotal=0, netDiscount=0, discountType,discountReceived=0;
				
		function getPurchasePrice()
		{
			originalPrice = parseInt(document.getElementById("original_price").value);
				
			//discountType  = parseInt(document.getElementById("discountType").value);
				
			    if(document.getElementById('percentage').checked)
			        {
						discount = parseInt(document.getElementById("discount").value);
						
						discountReceived = parseInt((originalPrice*discount)/100);
						
						purchasePrice = originalPrice-discountReceived;
			        }
		        else if(document.getElementById('amount').checked)
				    {
						discount = parseInt(document.getElementById("discount").value);
			            
						purchasePrice = originalPrice - discount;
					    discountReceived = discount;
				    }
				    
				else{
					 purchasePrice = originalPrice;
				}
				//alert(purchasePrice);			
		}
		function readOnlyPurchasePrice(){
			let purchaseValue = document.getElementById('purchase_price');
				purchaseValue.value=purchasePrice;	
			
		}
		
    //imei function		  
		  function getImeiValue()
			{    
			  let imeiValue = document.getElementById("imei").value;
			  return imeiValue;
			}
			function imeiFunction()
			{  
					val = getImeiValue();
					imeiArr.push(val);  
					document.getElementById("imei").value = "";	
			}

	//display table
			function insert()
			{
				//get the value from the "form" through specific id that are define in form fields then store in variable
				productId        = document.getElementById("product_name").value;
				expStarting      = document.getElementById("expiry_starting_date").value;
				expEnding        = document.getElementById("expiry_ending_date").value;
				//purchasePrice    = document.getElementById("purchase_price").value;
				salePrice        = document.getElementById("sale_price").value;
			
				// push is the method of array in javascript ,..and this method push the new value in array 
					productIdArr.push(productId);
					expStartingArr.push(expStarting);
					expEndingArr.push(expEnding);
					originalPriceArr.push(originalPrice);
					discountArr.push(discountReceived);
					purchasePriceArr.push(purchasePrice); 
					salePriceArr.push(salePrice);
					//imeiArr.push(imei);
					
				let table = document.getElementById("myTableData");
					
					//count the table row
					let rowCount = table.rows.length;
					
					//insert the new row
					let row = table.insertRow(1);
					
					//insert the coulmn against the row
					row.insertCell(0).innerHTML= rowCount;
					row.insertCell(1).innerHTML= productId;
					row.insertCell(2).innerHTML= expStarting;
					row.insertCell(3).innerHTML= expEnding;
					row.insertCell(4).innerHTML= originalPrice;
					row.insertCell(5).innerHTML= discountReceived;
					row.insertCell(6).innerHTML= purchasePrice;	 
					row.insertCell(7).innerHTML= salePrice;	 
					row.insertCell(8).innerHTML= val;	
			val = null;	
			       
			}
			let product,expS, expE,originalP,discountP, pPrice, sPrice,imeiNo;
			function objVariables(){
			            product     = productIdArr;
						expS        = expStartingArr;
						expE        = expEndingArr;
						originalP   = originalPriceArr;
						discountP   = discountArr;
						pPrice      = purchasePriceArr;
						sPrice      = salePriceArr;
						imeiNo      = imeiArr;	
						
						for(let i=0; i<purchasePriceArr.length; i++)
				          {
				         netTotal = netTotal+parseInt(purchasePriceArr[i]);
				          }
				       
					   for(let i=0; i<discountArr.length; i++)
				         {
				        netDiscount = netDiscount+parseInt(discountArr[i]);
				         }
					
					//alert(netTotal);
					//alert(netDiscount);
			}			
				
				$(document).ready(function(){
					$('#submit').click(function(){
						
					        $.ajax({
							url:"products_ajax_request.php",
							method: "POST",
							data:{purchase_invoice_id:purchaseInvoiceId, product_id:product ,exp_starting:expS, exp_ending:expE, original_price:originalP,discount_per_item:discountP, net_discount:netDiscount, net_total:netTotal, purchase_price:pPrice,sale_price:sPrice,imei_no:imeiNo},
                            
							success:function(message)
							{
								//alert(message);
								$(".modal-title").html(message);
							}
							}); 						
				        }); // click event
				});// ready 
		    </script>
			
        </div> 
        </div>
    </div>
</div>     
<?php include_once ('footer.php'); ?>        
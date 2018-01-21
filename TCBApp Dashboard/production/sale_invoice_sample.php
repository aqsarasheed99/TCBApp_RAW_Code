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
						
				    <div style="width:245px;"class="x_panel">
						<div class="x_title">
							<h5>Receipt</h5>
						</div>
						
						<div class="x_content">
							<p id="detail"></p>
							<p id="discount"></p>
						</div>	
					</div>
                    
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
                          <input type="number" name="imei" id="imei"  value=""class="form-control col-md-7 
						  col-xs-12">
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
								<thead>
									<tr >
									  <th>Index</th>
									  <th>Invoice Id</th>
									  <th>Products Name</th>
									  <th>Expiry Starting</th>
									  <th>Expiry Ending</th>
									  <th>Sale Price</th>
									  <th>Status</th>
									  <th>IMEI NO </th>
									  <th>Discount(%)</th>
									  <th>Delete</th>
									</tr>
								</thead>
						</table>
						
			</div>     
			</div>	
		</div>
	</div>
</div>
</div>
<script>	
						//this method print the table heading
						$("#imei").change(function(){
							$("#display_form").show();
						});
						
				var imeiNo,rowCount,sumOfSalePrice=0,sumOfDiscount=0,sumOfFinalPrice=0;
			 //array declaration 
				let purchaseInvoiceIdArr = new Array();
				let productIdArr = new Array();
				let expStartingArr = new Array();
				let expEndingArr = new Array();
				let salePriceArr = new Array();
				let statusArr = new Array();
				let imeiArr = new Array();
				let discountArr = new Array();
				let finalPriceArr = new Array();
				
			$('#imei').change(function(event){
				//get all input value in variable 
				 imeiNo = document.getElementById('imei').value;
				// this function is used to send data without page reloade
					event.preventDefault();
				
				$.ajax({
				  method:"POST",
				  url:"ajax_request_fetch_data_sale_invoice.php",
				  //take a imei number from user and send this data through ajax request
				  data:{imei_no:imeiNo}
				})
				//after success 
				.done(function(data){
					//parseJSON convert the string data into javascript object
					  //"data" include all the data that we recieve  
				    let json = JSON.stringify(eval('(' + data + ')'));					  
						data = $.parseJSON(json);
						//data=$.parseJSON(data);						
						  
					  //we get the invoice id from the object(data)
					    purchaseInvoiceId = data.purchase_invoice_id;
					    productId         = data.product_name;
					    expiryStarting    = data.expiry_starting_date;
					    expiryEnding      = data.expiry_ending_date;
					    salePrice         = data.sale_price;
					    status            = data.status;
					    imeiVal           = data.imei;
					  		
						//table array 
						let table = document.getElementById("myTableData");
				
						//count the table row
						rowCount = table.rows.length;
						
						//insert the new row
						let row = table.insertRow(rowCount);
						
					
						//insert the coulmn against the row
						row.insertCell(0).innerHTML= rowCount;
						row.insertCell(1).innerHTML= purchaseInvoiceId;
						row.insertCell(2).innerHTML= productId;
						row.insertCell(3).innerHTML= expiryStarting;
						row.insertCell(4).innerHTML= expiryEnding;
						row.insertCell(5).innerHTML= salePrice;
						row.insertCell(6).innerHTML= status;	 
						row.insertCell(7).innerHTML= imeiVal;
						row.insertCell(8).innerHTML= "<input style='width:150px;border-radius:8px;'value='0' type='text' id='discount' onchange='discountValue(this.value,this);'>";
						
						row.insertCell(9).innerHTML= "<input style='height:30px;border-radius:5px;'type='button' class='btn btn-danger' value='Delete' onclick='deleteRecord(this);'>";
						
						//push data into array
						purchaseInvoiceIdArr.push(purchaseInvoiceId);
						productIdArr.push(productId);
						expStartingArr.push(expiryStarting);
						expEndingArr.push(expiryEnding);
						salePriceArr.push(salePrice);
						statusArr.push(status);
						imeiArr.push(imeiVal);
						
						document.getElementById("imei").value = "";	
						
							finalPriceArr.push(salePrice);
						
							sumOfSalePrice = parseInt(sumOfSalePrice)+ parseInt(salePrice);
							
						    sumOfFinalPrice = sumOfSalePrice;
							
							document.getElementById('detail').innerHTML="Total:"+sumOfSalePrice;
							document.getElementById('discount').innerHTML="Discount:"+ sumOfDiscount + "<br/>Net Total:"+sumOfFinalPrice;
				});
			});
			
			function discountValue(value,index)
						{
							var a,discount=0 ;
                            a = index.parentNode.parentNode.rowIndex;
				            a = a-1;
							discount = (salePriceArr[a]*value)/100;
							//alert(salePriceArr[a]);
						
							//final price is a sale price after deduction discount 
							//var finalPrice = salePriceArr[a]-discount;
								
							discountArr.push(discount);
							
							sumOfDiscount = sumOfDiscount + discount;
							
							sumOfFinalPrice = sumOfFinalPrice - discount;
							
							document.getElementById('discount').innerHTML="Discount:" + sumOfDiscount + "</br>Net Total:" + sumOfFinalPrice;
						}
						
			function deleteRecord(value)
			{
				alert('Are you sure you want to delete it?');
				
				var i = value.parentNode.parentNode.rowIndex;
				document.getElementById("myTableData").deleteRow(i);
				var j=i-1;
				
				var price = salePriceArr[j];
				var finalP = finalPriceArr[j];
				var discountVal = discountArr[j];
				purchaseInvoiceIdArr.splice(j,1);
				productIdArr.splice(j,1);
				expStartingArr.splice(j,1);
				expEndingArr.splice(j,1);
				salePriceArr.splice(j,1);
				statusArr.splice(j,1);
				imeiArr.splice(j,1);
				discountArr.splice(j,1);
				finalPriceArr.splice(j,1);
				//alert(imeiArr);
				
				sumOfSalePrice = parseInt(sumOfSalePrice)- parseInt(price);
				sumOfFinalPrice = parseInt(sumOfFinalPrice)- parseInt(finalP)+ parseInt(discountVal);
				sumOfDiscount = parseInt(sumOfDiscount)- parseInt(discountVal);
				
				document.getElementById('detail').innerHTML="Total:"+sumOfSalePrice;
				document.getElementById('discount').innerHTML="Discount:"+ sumOfDiscount + "<br/>Net Total:"+sumOfFinalPrice;
				
				//alert(salePriceArr.length);
			}
	</script>
<?php include_once ('footer.php'); ?>        
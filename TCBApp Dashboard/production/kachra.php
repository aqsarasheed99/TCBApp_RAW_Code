 <?php include 'products_per_purchase_invoice_crud.php';?> 

 <?php 
	$id = 5;
									  
										
										$conn = new crudop();
									    $read = $conn->sumOfPurchasePrice($id);
									    $fetch = $read->fetch_assoc();
										echo $fetch["TotalItemsOrdered"];
										
?>
success:function(data)
							{
								//alert(message);
								//$(".x_content").html(message);
								
								let json = JSON.stringify(eval('(' + data + ')'));					  
								data = $.parseJSON(json);
							  
								//we get the invoice id from the object(data)
								   sum = data.TotalItemsOrdered;
									alert(sum);
							}
							
							
							
							function readOnlyNetTotal()
				{
					// purchaseValue = document.getElementById('purchase_price');
						//purchaseValue.value=purchasePrice;	
				}
				
		,$discount_per_products,		$discount_received_on_invoice,$net_discount,$net_total_of_invoice,$amount_paid,$amount_payable
		
		
		
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="bootstrap/js/bootstrap.min.js">
        <link rel="stylesheet" type="text/css" href="jquery/jquery.min.js">
		
		
		$distributer = "UPDATE purchase_invoice SET net_total_of_products=$net_total_of_products, products_discount=$discount_per_products,    
			discout_of_invoice=$discount_received_on_invoice, net_discount=$net_discount,net_total=$net_total_of_invoice,amount_paid=$amount_paid,
			amount_payable=$amount_payable WHERE id=$purchase_invoice_id";
			$insert = $this->conn->query($distributer);
			
			$distributer = "INSERT INTO purchase_invoice_accounts_detail VALUES(null,$purchase_invoice_id,$net_total_of_products,$discount_per_products,$discount_received_on_invoice,$net_discount,$net_total_of_invoice,$amount_paid,$amount_payable)";
			$insert = $this->conn->query($distributer);
			
			
			$distributer = "INSERT INTO purchase_invoice_accounts_detail VALUES(null,$purchase_invoice_id,$net_total_of_products,$discount_per_products,$discount_received_on_invoice,$net_discount,$net_total_of_invoice,$amount_paid,$amount_payable)";
			$insert = $this->conn->query($distributer);
			
			//table record
			$stmt = $this->conn->prepare("SELECT distributer.name,distributer.id,
				purchase.id,purchase.date,purchase.comment FROM distributors AS distributer INNER JOIN purchase_invoice AS purchase ON distributer.id=purchase.distributer_id ORDER BY purchase.id DESC") or die($this->conn->error);
				
				
				
			//three joins
				public function read(){
				$stmt = $this->conn->prepare("SELECT distributer.name,distributer.id,purchase.id,purchase.date,purchase.comment,accounts.invoice_id,	accounts.net_total_of_products,accounts.products_discount,accounts.discount_of_invoice,accounts.net_discount_of_invoice,accounts.net_total,accounts.amount_paid,accounts.amount_payable FROM distributors AS distributer INNER JOIN purchase_invoice AS purchase ON distributer.id=purchase.distributer_id INNER JOIN purchase_invoice_accounts_detail AS accounts ON purchase.id=accounts.invoice_id ORDER BY purchase.id DESC") or die($this->conn->error);
				if($stmt->execute()){
					$result = $stmt->get_result();
					return $result;
				}
		}
		
		
		$sql="SELECT * FROM products_per_purchase_invoice WHERE imei='".$userAnswer."'" ;
		
		
		
		//table array 
		 let table = document.getElementById("myTableData");
				
						//count the table row
						let rowCount = table.rows.length;
						
						//insert the new row
						let row = table.insertRow(rowCount);
						
						//insert the coulmn against the row
						row.insertCell(0).innerHTML= purchaseInvoiceId;
						row.insertCell(1).innerHTML= productId;
						row.insertCell(2).innerHTML= expiryStarting;
						row.insertCell(3).innerHTML= expiryEnding;
						row.insertCell(4).innerHTML= salePrice;
						row.insertCell(5).innerHTML= status;	 
						row.insertCell(6).innerHTML= imeiVal;
						
	//table headings
	
	<table id="myTableData" id="datatable-responsive"  class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
								<thead>
									<tr >
									  <th>Purchase Invoice Id</th>
									  <th>Products Name</th>
									  <th>Expiry Starting</th>
									  <th>Expiry Ending</th>
									  <th>Sale Price</th>
									  <th>Status</th>
									  <th>IMEI</th>
									  <th>Discount</th>
									</tr>
								</thead>
								<tbody>
									<tr>
							<td>
								
									<input type="checkbox" name="item_index[]" checked />	
							</td>
							<td>
								
									<input type="text" name="invoice_id" id="invoice_id" value="<?php echo $row["purchase_invoice_id"];?>" required="required" class="form-control">
								
							</td>
							<td>
								
									<input type="text" name="product_name" id="product_name" value="<?php echo $row["product_name"];?>"  required="required" class="form-control">
								
							</td>
							<td>
								
									<input type="date" name="expiry_starting" id="expiry_starting_date" 
									value="<?php echo $row["expiry_starting_date"];?>" required="required" class="form-control">
								
							</td>
							<td>
								
								    <input type="date" name="expiry_ending" id="expiry_ending_date"
										value="<?php echo $row["expiry_ending_date"];?>" required="required" class="form-control">
								
							</td>
							<td>
							
									<input type="text" name="sale_price" id="sale_price"
									value="<?php echo $row["sale_price"];?>" required="required" class="form-control">
								
							</td>
							<td>
								
									<input type="text" name="status" id="status" value="<?php echo $row["status"];?>" 
									required="required" class="form-control">
								
							</td>
							<td>
								
									<input type="number" maxlength="15" name="imei" id="imei"
									value="<?php echo $row["imei"];?>"  required="required"  class="form-control">
								
							</td>
							<td>
									<input type="number" name="discount" id="discount" placeholder="Enter discount" required="required"  class="form-control">
							</td>
						</tr>
								</tbody>
						</table>
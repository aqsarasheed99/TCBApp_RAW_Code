		<?php
			define("DB_SERVER","localhost");
			define("DB_USER","root");
			define("DB_PASSWORD","");
			define("DB_NAME","mobile_application");
			$connection=mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);
			if(mysqli_connect_errno()) {
										 die("connection faild!".
										 mysqli_connect_error().
										 "(". mysqli_connect_errno() .")"
										 );
			}
		?>			
		<!--form start -->
						
		<?php
			$imei_no = $_POST['imei_no'];
			
				
			$sql="SELECT product.product_name,product.id,purchase.id,purchase.purchase_invoice_id,purchase.product_id,
	        purchase.expiry_starting_date,purchase.expiry_ending_date,purchase.sale_price,purchase.status,purchase.imei
		    FROM products AS product INNER JOIN products_per_purchase_invoice AS purchase ON product.id=purchase.product_id WHERE purchase.imei='".$imei_no."'";
			$result=mysqli_query($connection,$sql);
			while($row=mysqli_fetch_array($result))
			{
				 echo json_encode($row);  // pass array in json_encode 
			?>	
						<tr>
							<td>								
									<?php echo $row["purchase_invoice_id"];?>
							</td>
							<td>							
									<?php echo $row["product_name"];?>
							</td>
							<td>								
									<?php echo $row["expiry_starting_date"];?>								
							</td>
							<td>
								    <?php echo $row["expiry_ending_date"];?>
							</td>
							<td>	
									<?php echo $row["sale_price"];?>
							</td>
							<td>
									<?php echo $row["status"];?> 
							</td>
							<td>
									<?php echo $row["imei"];?>								
							</td>
							<td>
									<input style="width:150px;border-radius:8px;"type="number" name="discount" id="discount" placeholder="Enter discount" required="required"  class="form-control">
							</td>
							<td>
								<!--<input style="border-radius:8px;" type="button" value="delete">-->
								<input style="border-radius:5px; margin-top:2px;" type="button"  value="Delete" class="btn btn-danger">
							</td>
						</tr>
			<?php
			// for first row only and suppose table having data
			 
			  }?>
			    
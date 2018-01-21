

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
<?php 
	//php variable that get the imei value from sale_invoice.php
	$imei_no = $_POST['imei_no'];	
	$product_name = $_POST['product_name'];	
	//select query 
	  $sql="SELECT product.product_name,product.id,purchase.id,purchase.purchase_invoice_id,purchase.product_id,purchase.expiry_starting_date,purchase.expiry_ending_date
	,purchase.sale_price,purchase.status,purchase.imei FROM products AS 
			product INNER JOIN products_per_purchase_invoice AS purchase ON product.id=purchase.product_id WHERE purchase.imei='".$imei_no."'";
	$result=mysqli_query($connection,$sql);
	$row=mysqli_fetch_array($result);
	
  // for first row only and suppose table having data
      echo json_encode($row);  // pass array in json_encode  
	 ?>

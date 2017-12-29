<?php		
		$invoice_id    = @$_POST['invoice_id'];
		$product_id     = $_POST['product_id'];
		$exp_starting   = $_POST['exp_starting'];
	    $exp_ending     = $_POST['exp_ending'];
		$purchase_price = $_POST['purchase_price'];	
		$sale_price     = $_POST['sale_price'];
		$imei           = $_POST['imei_no'];
		
		//var_dump('$sale_price');
			
		//count function count the length of the array
		$length = count($product_id);
		
		//echo $invoice_id;
		
		include "products_per_purchase_invoice_crud.php";
		//insert query
		$insert = new crudop();
		$insert->insertArray($invoice_id,$product_id,$exp_starting,$exp_ending,$purchase_price,$sale_price,$imei,$length);		
?>

<?php		
		$purchase_invoice_id = @$_POST['purchase_invoice_id'];
		$product_id         = $_POST['product_id'];
		$exp_starting       = $_POST['exp_starting'];
	    $exp_ending         = $_POST['exp_ending'];
	    $original_price     = $_POST['original_price'];
	    $discount_per_item  = $_POST['discount_per_item'];
		//$net_discount       = $_POST['net_discount'];	
		//$net_total          = $_POST['net_total'];	
		$purchase_price     = $_POST['purchase_price'];
		$sale_price         = $_POST['sale_price'];
		$imei               = $_POST['imei_no'];
		
		//var_dump('$net_total');
		//echo $net_total;
			
		//count function count the length of the array
		$length = count($product_id);
		
		//echo $invoice_id;
		
		include "products_per_purchase_invoice_crud.php";
		//insert query
		$insert = new crudop();
		$insert->insertArray($purchase_invoice_id,$product_id,$exp_starting,$exp_ending,$original_price,$discount_per_item,$purchase_price,$sale_price,$imei,$length);

		// $conn = new crudop();
		// $read = $conn->sumOfPurchasePrice($purchase_invoice_id );
		// $fetch = $read->fetch_assoc();
		// //echo $fetch["TotalItemsOrdered"];
		// echo json_encode($fetch["TotalItemsOrdered"]);
?>

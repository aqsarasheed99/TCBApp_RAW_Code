<?php		
	

		$purchase_invoice_id           = @$_POST['purchase_invoice_id'];
		$net_total_of_products         = $_POST['net_total_of_products'];
		$discount_per_products         = $_POST['discount_per_products'];
	    $discount_received_on_invoice  = $_POST['discount_received_on_invoice'];
	    $net_discount                  = $_POST['net_discount'];
	    $net_total_of_invoice          = $_POST['net_total_of_invoice'];
		$amount_paid                   = $_POST['amount_paid'];
		$amount_payable                = $_POST['amount_payable'];
		
		include "purchase_invoice_accounts_crud.php";
		//echo $balance;
		//insert query
		$insert = new crudop();
			    
		$read = $insert->readInvoice($purchase_invoice_id);
		$fetch_data = $read->fetch_assoc();
		    
		$distributer_id = $fetch_data['distributer_id']; 
		$date = $fetch_data['date']; 
		$comment = $fetch_data['comment']; 
		
	//echo $comment."<br>".$date."<br>".$distributer_id;
	    $insert->updateAccountsDetail($purchase_invoice_id,$distributer_id,$date,$comment,$net_total_of_products,$discount_per_products,$discount_received_on_invoice, $net_discount, $net_total_of_invoice,$amount_paid,$amount_payable);
?>

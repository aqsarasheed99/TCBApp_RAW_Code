<?php		
	include "purchase_invoice_accounts_crud.php";

		$purchase_invoice_id           = $_POST['purchase_invoice_id'];
		$net_total_of_products         = $_POST['net_total_of_products'];
		$discount_per_products         = $_POST['discount_per_products'];
	    $discount_received_on_invoice  = $_POST['discount_received_on_invoice'];
	    $net_discount                  = $_POST['net_discount'];
	    $net_total_of_invoice          = $_POST['net_total_of_invoice'];
		$amount_paid                   = $_POST['amount_paid'];
		$amount_payable                = $_POST['amount_payable'];
		
		
		//insert query
		$insert = new crudop();
		$insert->insertAccountsDetail($purchase_invoice_id,$net_total_of_products,$discount_per_products,$discount_received_on_invoice, $net_discount, $net_total_of_invoice,$amount_paid,$amount_payable);
?>

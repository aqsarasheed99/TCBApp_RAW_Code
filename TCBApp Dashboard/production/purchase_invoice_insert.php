<?php include 'purchase_invoice_crud.php' ?>
<?php		
		//values received from "puchase_invoice" page and store in php variables 
			
			$distributer_id = $_POST['distributer_id'];
			$date = $_POST['date'];
			$amount_paid = $_POST['amount_paid'];
			$amount_payable = $_POST['amount_payable'];
			$discount_received = $_POST['discount_received'];	
			$net_total= $_POST['net_total'];
			$comment= $_POST['comment'];
				
		//insert query
		$insert = new crudop();
		$insert->insert($distributer_id,$date,$amount_paid,$amount_payable, $discount_received,$net_total,$comment);
?>

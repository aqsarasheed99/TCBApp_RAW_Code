<?php include 'purchase_invoice_crud.php' ?>
<?php		
		//values received from "puchase_invoice" page and store in php variables 
			
			$distributer_id = $_POST['distributer_id'];
			$date = $_POST['date'];
		    $comment= $_POST['comment'];
				
		//insert query
		$insert = new crudop();
		$insert->insert($distributer_id,$date,$comment);
?>

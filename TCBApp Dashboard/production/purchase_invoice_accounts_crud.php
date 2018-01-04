<?php 
        include_once 'db_connection.php';
		include_once 'function.php';
        include_once 'session.php';
	    
		class crudop extends db_connection{
			
		public function __construct(){
			 $this->connect();
			    }
		public function updateAccountsDetail($purchase_invoice_id,$distributer_id,$date,$comment,$net_total_of_products,$discount_per_products,$discount_received_on_invoice, $net_discount, $net_total_of_invoice,$amount_paid,$amount_payable)
		{	
			$invoice = "UPDATE purchase_invoice SET distributer_id=$distributer_id,date='$date',comment='$comment',net_total_of_products=$net_total_of_products,products_discount=$discount_per_products,discount_of_invoice=$discount_received_on_invoice, net_discount=$net_discount,
			net_total=$net_total_of_invoice,amount_paid=$amount_paid,amount_payable=$amount_payable WHERE id=$purchase_invoice_id";
			
			$insert = $this->conn->query($invoice);
			  if($insert){
						//Success
					  $_SESSION["message"] = "Accounts Detail of Invoice inserted successfully.";?>
					   <script>window.location="purchase_invoice.php"; 
					   </script>
					<?php	 } else {
						//Failure
					  $_SESSION["message"] = "Accounts Detail of Invoice insertion failed.";?>
					   <script>window.location="purchase_invoice.php"; 
					   </script>
			<?php
				}
		    
		    }
			
		//read purchase invoice detail like distributer name, date, comment
		public function readInvoice($purchase_invoice_id)
		{
		    $read_invoice = $this->conn->prepare("SELECT * FROM purchase_invoice WHERE id=$purchase_invoice_id") or die($this->conn->error);
				
				if($read_invoice->execute()){
					$result = $read_invoice->get_result();
					return $result;
				}
		}
	}
?>
		
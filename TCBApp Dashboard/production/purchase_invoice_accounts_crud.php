<?php 
        include_once 'db_connection.php';
		include_once 'function.php';
        include_once 'session.php';
	    
		class crudop extends db_connection{
			
		public function __construct(){
			 $this->connect();
			    }
		public function insertAccountsDetail($purchase_invoice_id,$net_total_of_products,$discount_per_products,$discount_received_on_invoice, $net_discount, $net_total_of_invoice,$amount_paid,$amount_payable)
		{
			$distributer = "INSERT INTO purchase_invoice_accounts_detail VALUES(null,$purchase_invoice_id,$net_total_of_products,$discount_per_products,$discount_received_on_invoice,$net_total_of_invoice,$amount_paid,$amount_payable)";
			$insert = $this->conn->query($distributer);
			  if($insert){
						//Success
					  $_SESSION["message"] = "Accounts Detail of Invoice inserted successfully.";?>
					   <script>window.location="products_per_purchase_invoice.php"; 
					   </script>';
					<?php	 } else {
						//Failure
					  $_SESSION["message"] = "Accounts Detail of Invoice insertion failed.";?>
					   <script>window.location="products_per_purchase_invoice.php?invoice_id=<?php echo $purchase_invoice_id;?>"; 
					   </script>
			<?php
				}
		    
		    }
		}
?>
		
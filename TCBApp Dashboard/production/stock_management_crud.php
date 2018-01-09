
 <?php 
        include_once 'db_connection.php';
		include_once 'function.php';
        include_once 'session.php';
	    
		class crudop extends db_connection
		{
			
		public function __construct()
		{
			 $this->connect();
		}
			//read products recorde where status is available
			public function availableStock()
		    {
				$stmt = $this->conn->prepare("SELECT product.product_name,product.id,invoice.id,invoice.purchase_invoice_id, invoice.product_id,invoice.expiry_starting_date,invoice.expiry_ending_date,invoice.sale_price,
				invoice.status,invoice.imei FROM products AS product INNER JOIN products_per_purchase_invoice AS invoice ON product.id=invoice.product_id WHERE invoice.status = 'available' ") or die($this->conn->error);
				if($stmt->execute()){
					$result = $stmt->get_result();
					return $result;
				}
		    }	
			
			//read products record where status is sold
			public function soldStock()
		    {
				$stmt = $this->conn->prepare("SELECT product.product_name,product.id,invoice.id,invoice.purchase_invoice_id, invoice.product_id,invoice.expiry_starting_date,invoice.expiry_ending_date,invoice.sale_price,
				invoice.status,invoice.imei FROM products AS product INNER JOIN products_per_purchase_invoice AS invoice ON product.id=invoice.product_id WHERE invoice.status = 'sold'") or die($this->conn->error);
				if($stmt->execute()){
					$result = $stmt->get_result();
					return $result;
				}
		    }	
		
	}
?>
		
		
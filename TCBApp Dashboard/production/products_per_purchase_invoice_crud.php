 <?php 
    include_once 'db_connection.php';    
		class crudop extends db_connection{
			
		public function __construct(){
			 $this->connect();
			    }
		
		//insert array 
		public function insertArray($invoice_id,$product_id,$exp_starting,$exp_ending,$purchase_price,$sale_price,$imei,$length)
		{
	
        for($i=0; $i< $length; $i++)
		{
		$query = "INSERT INTO products_per_purchase_invoice VALUES(null,'$invoice_id','$product_id[$i]','$imei[$i]','$exp_starting[$i]',
		                                            '$exp_ending[$i]','$purchase_price[$i]','$sale_price[$i]')";
		$result = $this->conn->query($query);
		}
		if(!$result)
			{
				echo "<br>";
				echo "something wrong!";	
			}else
			{
				echo "data inserted";
			}
			
		}
		
		//product reads in select box
		public function readProducts(){
				$stmt = $this->conn->prepare("SELECT * FROM products") or die($this->conn->error);
				if($stmt->execute()){
					$result = $stmt->get_result();
					return $result;
				}
			  }
		  
		//products per invoice read query display in record table
			  	public function readProductsPerInvoice($invoice_id){
				$stmt = $this->conn->prepare("SELECT product.product_name,product.id,invoice.purchase_invoice_id, invoice.product_id,invoice.imei,invoice.expiry_starting_date,invoice.expiry_ending_date,invoice.purchase_price,
				invoice.sale_price FROM products AS product INNER JOIN products_per_purchase_invoice AS invoice ON product.id=invoice.product_id WHERE invoice.purchase_invoice_id = $invoice_id ORDER BY invoice.purchase_invoice_id DESC ") or die($this->conn->error);
				if($stmt->execute()){
					$result = $stmt->get_result();
					return $result;
				}
		}	
		//read product name against id
			public function readProductName($product_id){
				$stmt = $this->conn->prepare("SELECT product_name FROM products WHERE id=$product_id") or die($this->conn->error);
				if($stmt->execute()){
					$result = $stmt->get_result();
					return $result;
				}
			}
			
		 // delete department
		public function delete_department($department_id){
			$delete = "DELETE FROM department WHERE id = {$department_id}";
			$deleted = $this->conn->query($delete);
			if($deleted){
				//Success
					$_SESSION["message"] = "department deleted successfully.";
					redirect_to("department_record.php");
				} else {
				//Failure
				  $_SESSION["message"] = "department deleted  failed.";
				  redirect_to("department_record.php");
				}
		    }
		 
		
		// update department
		public function update($department_id , $department_name){
			$updates = "UPDATE department SET department_name = '{$department_name}' WHERE id = {$department_id}";
			$update = $this->conn->query($updates);

			 if($update){
					//Success
						$_SESSION["message"] = "department edit successfully.";
						echo '<script>window.location="department_record.php"; </script>';

					//	redirect_to("department_record.php");
					} else {
					//Failure
					  $_SESSION["message"] = "department edit  failed.";
					//redirect_to("department_record.php");
					}
				  }
		}
?>
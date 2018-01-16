 <?php 
    include_once 'db_connection.php';    
		class crudop extends db_connection{
			
		public function __construct(){
			 $this->connect();
			    }
		
		//insert array 
		public function insertArray($purchase_invoice_id,$product_id,$exp_starting,$exp_ending,$original_price,$discount_per_item,$purchase_price,$sale_price,$imei,$status,$length)
		{
        for($i=0; $i< $length; $i++)
		{
		$query = "INSERT INTO products_per_purchase_invoice VALUES(null,'$purchase_invoice_id','$product_id[$i]','$exp_starting[$i]','$exp_ending[$i]','$original_price[$i]','$discount_per_item[$i]','$purchase_price[$i]','$sale_price[$i]','$status[$i]','$imei[$i]')";											
		$result = $this->conn->query($query);
		}
		 if($result){
				//Success
				$_SESSION["message"] = "Products added against purchase invoice successfully."; ?>
					<script>
					    window.location="products_per_purchase_invoice.php?invoice_id=<?php echo $purchase_invoice_id;?>";
					</script>
		 <?php }else{
					$_SESSION["message"] = "Products added against purchase invoice failed."; ?>
					<script>
					    window.location="products_per_purchase_invoice.php?invoice_id=<?php echo $purchase_invoice_id;?>";
					</script>
			
		<?php
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
				$stmt = $this->conn->prepare("SELECT product.product_name,product.id,invoice.id,invoice.purchase_invoice_id, invoice.product_id,invoice.expiry_starting_date,invoice.expiry_ending_date,invoice.original_price,
				invoice.discount_per_item,invoice.purchase_price,invoice.sale_price,invoice.status,invoice.imei FROM products AS product INNER JOIN products_per_purchase_invoice AS invoice ON product.id=invoice.product_id WHERE invoice.purchase_invoice_id = $invoice_id ORDER BY invoice.purchase_invoice_id DESC ") or die($this->conn->error);
				if($stmt->execute()){
					$result = $stmt->get_result();
					return $result;
				}
		}	
		//count the row of purchase_price column 
		public function countRows($invoice_id)
		{
			$count = $this->conn->prepare("SELECT COUNT(purchase_price) FROM products_per_purchase_invoice WHERE purchase_invoice_id=$invoice_id") or die($this->conn->error);
				if($count->execute()){
					$result = $count->get_result();
					return $result;
				}
		}
		
		//sum of purchase invoice column
				public function sumOfPurchasePrice($invoice_id){
				$stmt = $this->conn->prepare("SELECT  SUM(purchase_price) AS purchasePrice FROM products_per_purchase_invoice WHERE purchase_invoice_id=$invoice_id") or die($this->conn->error);
				if($stmt->execute()){
					$result = $stmt->get_result();
					return $result;
				}
			}
       
	   //sum of discount_per_item column
				public function sumOfDiscountOfProducts($invoice_id){
				$stmt = $this->conn->prepare("SELECT  SUM(discount_per_item) AS productsDiscount FROM products_per_purchase_invoice WHERE purchase_invoice_id=$invoice_id") or die($this->conn->error);
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
		//this function is used to display purchase invoice data in edit form
			  	public function displayPurchaseInvoiceData($id){
				$stmt = $this->conn->prepare("SELECT product.product_name,product.id,invoice.id,invoice.purchase_invoice_id, invoice.product_id,invoice.expiry_starting_date,invoice.expiry_ending_date,invoice.original_price,
				invoice.discount_per_item,invoice.purchase_price,invoice.sale_price,invoice.imei FROM products AS product INNER JOIN products_per_purchase_invoice AS invoice ON product.id=invoice.product_id WHERE invoice.id = $id ") or die($this->conn->error);
				if($stmt->execute()){
					$result = $stmt->get_result();
					return $result;
				}
		    }
			 // update products per perchase invoice data
			public function updateProductsPerPurchaseInvoice($id,$product_id,$expiry_starting,$expiry_ending,$original_price,$discount_per_item,$purchase_price,$sale_price,$imei)
			{
				$updates ="UPDATE products_per_purchase_invoice SET product_id =$product_id,expiry_starting_date='{$expiry_starting}',expiry_ending_date='{$expiry_ending}',original_price=$original_price,discount_per_item=$discount_per_item,purchase_price=$purchase_price,sale_price=$sale_price,imei=$imei WHERE id=$id";
				$update = $this->conn->query($updates);

				 if($update){
						//Success
					$_SESSION["message"] = "products Edit Successfully.";
					echo '<script>window.location="products_per_purchase_invoice.php"; </script>';
						} else {
						//Failure
					$_SESSION["message"] = "products Edit Failed.";
					echo '<script>window.location="products_per_purchase_invoice.php";</script>';
						}
			}
				  
		}
?>
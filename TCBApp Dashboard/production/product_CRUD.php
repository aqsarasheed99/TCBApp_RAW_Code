  <?php  include_once 'session.php';
         include_once 'db_connection.php';
	     include_once 'function.php';
     
        class crudOp extends db_connection{
			
		public function __construct(){
			 $this->connect();
			    }
		  
		  public function insert_product($product_name,$manufacturer){
		 	 $insert  = "INSERT INTO products VALUES (null,'{$product_name}','{$manufacturer}')";
			 $insert = $this->conn->query($insert);
			 if($insert){
			 echo "data is inserted";
			 }
			 if($insert){
				//Success
			   $_SESSION["message"] = "Product created successfully.";
			   echo '<script>window.location="products_record.php"; </script>';
					} else {
				//Failure
				  $_SESSION["message"] = "Product creation failed.";
				  echo '<script>window.location="products_record.php"; </script>';
					 }
			}
			//fetch whole data from products table 
		  public function read(){
			$stmt = $this->conn->prepare("SELECT * FROM products") or die($this->conn->error);
			if($stmt->execute()){
				$result = $stmt->get_result();
				return $result;
			    }
		     }
		  // delete product selected product
		  public function delete_product($product_id){
				$delete = "DELETE FROM products WHERE id = {$product_id}";
				$deleted = $this->conn->query($delete);
				if($deleted){
					//Success
					$_SESSION["message"] = "Product Deleted Successfully.";
				    echo '<script>window.location="products_record.php"; </script>';
					} else {
					//Failure
					$_SESSION["message"] = "Product Deleted  Failed.";
				    echo '<script>window.location="products_record.php"; </script>';
					}
				}
		  //fetch data against selected id
		  public function fetch_selected_id($product_id){
			  $stmt=$this->conn->prepare("SELECT * FROM products WHERE id ={$product_id}") or die($this->conn->error);
			   if($stmt->execute()){ 
				$result = $stmt->get_result();
				return $result;
			      }
			  }
		 // update product
		public function update($product_id,$product_name,$manufacturer){
			$updates = "UPDATE  products SET product_name = '{$product_name}', manufacturer='{$manufacturer}' WHERE id = {$product_id}";
			$update = $this->conn->query($updates);

			 if($update){
					//Success
				$_SESSION["message"] = "Product updated Successfully.";
			    echo '<script>window.location="products_record.php"; </script>';
				  } else {
					//Failure
					$_SESSION["message"] = "Product updation  Failed.";
				    echo '<script>window.location="products_record.php"; </script>';
					}
				  }
	}
?>
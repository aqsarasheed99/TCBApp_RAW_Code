 <?php 
        include_once 'db_connection.php';
		include_once 'function.php';
        include_once 'session.php';
	    
		class crudop extends db_connection{
			
		public function __construct(){
			 $this->connect();
			    }
		public function insert($distributer_id,$date,$comment)
		{
			$distributer = "INSERT INTO purchase_invoice (distributer_id,date,comment) VALUES($distributer_id,'$date','$comment')";
			$insert = $this->conn->query($distributer);
			  if($insert){
						//Success
					  $_SESSION["message"] = "invoice created successfully.";
					   echo '<script>window.location="purchase_invoice.php"; </script>';
						 } else {
						//Failure
					  $_SESSION["message"] = "invoice creation failed.";
					   echo '<script>window.location="purchase_invoice.php"; </script>';
						 }   
		}
		//read function is used to display distributer name in purchase invoice record
		public function read(){
				$stmt = $this->conn->prepare("SELECT distributer.name,distributer.id,purchase.id,purchase.date,purchase.comment,purchase.net_total_of_products,
				purchase.products_discount,purchase.discount_of_invoice,purchase.net_discount,purchase.net_total,purchase.amount_paid,purchase.amount_payable
				FROM distributors AS distributer INNER JOIN purchase_invoice AS purchase ON distributer.id=purchase.distributer_id ORDER BY purchase.id DESC") or die($this->conn->error);
				if($stmt->execute()){
					$result = $stmt->get_result();
					return $result;
				}
		}	
		
		
		public function readDistributers(){
				$stmt = $this->conn->prepare("SELECT * FROM distributors") or die($this->conn->error);
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
		 // fetch data of selected department
		public function selected_department($department_id){
			$stmt = $this->conn->prepare("SELECT * FROM department WHERE id = {$department_id}") 
			        or die($this->conn->error);
			if($stmt->execute()){
				$result = $stmt->get_result();
				return $result;
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
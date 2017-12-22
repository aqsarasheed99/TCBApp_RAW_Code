 <?php 
    include_once 'db_connection.php';
	    
		class crudop extends db_connection{
			
		public function __construct(){
			 $this->connect();
			    }
		public function insert($distributer_id,$date,$amount_paid,$amount_payable, $discount_received,$net_total)
		{
			$distributer = "INSERT INTO purchase_invoice VALUES(null,$distributer_id,'$date',$amount_paid,$amount_payable, $discount_received,$net_total)";
			$insert = $this->conn->query($distributer);
		}
		public function read(){
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
 <?php 

     include_once 'db_connection.php';
		include_once 'function.php';
     include_once 'session.php';

	    
		class crudop extends db_connection{
			
		public function __construct(){
			 $this->connect();
			    }

		
		public function read(){
				$stmt = $this->conn->prepare("SELECT distributer.name,distributer.id,
				purchase.id,purchase.date,purchase.amount_paid,purchase.amount_payable,
				purchase.discount_received,purchase.net_total FROM distributors AS distributer INNER JOIN purchase_invoice AS purchase ON distributer.id=purchase.distributer_id ORDER BY purchase.id DESC") or die($this->conn->error);

		public function insert($distributer_id,$date,$comment)
		{
			$distributer = "INSERT INTO purchase_invoice VALUES(null,$distributer_id,'$date','$comment')";
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
				$stmt = $this->conn->prepare("SELECT distributer.name,distributer.id,
				purchase.id,purchase.date,purchase.comment FROM distributors AS distributer INNER JOIN purchase_invoice AS purchase ON distributer.id=purchase.distributer_id ORDER BY purchase.id DESC") or die($this->conn->error);

				if($stmt->execute()){
					$result = $stmt->get_result();
					return $result;
				}
		}	
		//read function is used to display distributer name in purchase invoice record
		public function readDistributers(){
				$stmt = $this->conn->prepare("SELECT * FROM distributors") or die($this->conn->error);
				if($stmt->execute()){
					$result = $stmt->get_result();
					return $result;
				}
			  }

		 // delete purchase_invoice
		public function delete_purchase_invoice($purchase_invoice_id){
			$delete = "DELETE FROM purchase_invoice WHERE id = {$purchase_invoice_id}";
			$deleted = $this->conn->query($delete);
			if($deleted){
				//Success
					$_SESSION["message"] = "Purchase Invoice deleted successfully.";
					redirect_to("purchase_invoice.php");
				} else {
				//Failure
				  $_SESSION["message"] = "Purchase Invoice deleted  failed.";
				  redirect_to("purchase_invoice.php");
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
  <?php 
     include_once 'db_connection.php';
	  include_once 'function.php';
      include_once 'session.php';
     
  class crudOp extends db_connection{
		public function __construct(){
			 $this->connect();
			    }
		  //insert distributor
		 public function insert_distributor($name,$father_name,$cnic,$phone_no,$address){
		 	  $inserts="INSERT INTO distributors VALUES(null,'{$name}','{$father_name}',
			'{$cnic}','{$phone_no}','{$address}')";
			 $insert = $this->conn->query($inserts);
			 if($insert){
				//Success
			  $_SESSION["message"] = "Distributor created successfully.";
			   echo '<script>window.location="distributor_record.php"; </script>';
				 } else {
				//Failure
			  $_SESSION["message"] = "Distributor creation failed.";
			   echo '<script>window.location="distributor.php"; </script>';
				 }
		    }
			//fetch all record from distributor table
		  public function read(){
			$stmt = $this->conn->prepare("SELECT * FROM distributors") or die($this->conn->error);
			  if($stmt->execute()){
					$result = $stmt->get_result();
					return $result;
			    }
		    }
		 // delete distributor
			public function delete_distributor($distributor_id){
				$delete = "DELETE FROM distributors WHERE id = {$distributor_id}";
				$deleted = $this->conn->query($delete);
				if($deleted){
					//Success
				  $_SESSION["message"] = "Distributor Deleted Successfully.";
			      echo '<script>window.location="distributor_record.php"; </script>';
					} else {
					//Failure
				  $_SESSION["message"] = "Distributor Deleted  Failed.";
			      echo '<script>window.location="distributor_record.php"; </script>';
					}
				}
			//fetch data against selected id
			public function fetch_selected_id($distributor_id){
				$stmt=$this->conn->prepare("SELECT * FROM distributors WHERE id ={$distributor_id}") or die($this->conn->error);
				   if($stmt->execute()){ 
					$result = $stmt->get_result();
					return $result;
					  }
				  }
			 // update distributor
			public function update($distributor_id,$name,$father_name,$cnic,$phone_no,$address){
				$updates ="UPDATE distributors SET name ='{$name}',father_name='{$father_name}',cnic='{$cnic}',phone_no='{$phone_no}',address ='{$address}' WHERE id = {$distributor_id}";
				$update = $this->conn->query($updates);

				 if($update){
						//Success
					$_SESSION["message"] = "Distributor Edit Successfully.";
					echo '<script>window.location="distributor_record.php"; </script>';
						} else {
						//Failure
					$_SESSION["message"] = "Distributor Edit Failed.";
					echo '<script>window.location="distributor_record.php";</script>';
						}
					  }
		}
?>
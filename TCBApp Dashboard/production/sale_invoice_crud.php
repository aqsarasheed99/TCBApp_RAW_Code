 <?php 
        include_once 'db_connection.php';
		include_once 'function.php';
        include_once 'session.php';
	    
		class crudop extends db_connection{
			
		public function __construct(){
			 $this->connect();
			    }
		
		//fetch data against IMEI number
		public function fetchDataAgainstImei($imei_no)
		{
				$fetch = $this->conn->prepare("SELECT * FROM products_per_purchase_invoice WHERE imei=$imei_no") or die($this->conn->error);
				if($fetch->execute()){
					$result = $fetch->get_result();
					return $result;
				}
		}	
		
		
		}
?>
<?php
   include_once 'customer_crud.php';
                $name        = $_POST["name"];
				$father_name = $_POST["father_name"];
				$cnic        = $_POST["cnic"];
				$phone_no    = $_POST["phone_no"];
				$address     = $_POST["address"];

				
		        $crud = new crudop();
				$crud->customer($name,$father_name,$cnic,$phone_no,$address);
				
?>
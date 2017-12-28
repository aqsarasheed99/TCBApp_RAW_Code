<?php
   include_once 'product_CRUD.php';
                $product_name   = $_POST["product_name"];
				$manufacturer   = $_POST["manufacturer"];

				
		        $crud = new crudOp();
				$crud->insert_product($product_name,$manufacturer);
				
?>
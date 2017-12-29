<?php 
     include_once 'product_CRUD.php';
	  if (isset($_GET["product_id"])) {
		$product_id =$_GET["product_id"] ;
	  }
	?>
 <?php 
     $crud = new crudop();
	 $crud->delete_product($product_id);
?>
<?php 
     include_once 'distributor_crud.php';
	  if (isset($_GET["distributor_id"])) {
		$distributor_id =$_GET["distributor_id"] ;
	  }
	?>
 <?php 
     $crud = new crudop();
	 $crud->delete_distributor($distributor_id);
?>
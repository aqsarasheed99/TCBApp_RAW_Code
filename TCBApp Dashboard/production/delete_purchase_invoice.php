<?php 
     include_once 'purchase_invoice_crud.php';
	  if (isset($_GET["purchase_invoice_id"])) {
		$purchase_invoice_id =$_GET["purchase_invoice_id"] ;
	  }
	?>
 <?php 
     $crud = new crudop();
	 $crud->delete_purchase_invoice($purchase_invoice_id);
?>
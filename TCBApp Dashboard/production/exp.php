

<?php include 'purchase_invoice_crud.php';?>
		<?php 
					   $connection = new crudop();
					   $read = $connection->read();
					   while($fetch = $read->fetch_array()){
					 ?>
			<?php echo $fetch["id"]; ?>
			<?php echo $fetch["name"]; ?>	
			
	<?php } ?>

<?php
    function redirect_to($new_location) {
    header("Location:" . $new_location);
    exit();
    }
		  	  
	function logged_in() {
		return isset($_SESSION['admin_id']);
	}
	
	function confirm_logged_in() {
			if(!logged_in()) {
		redirect_to("login.php");
	}
	}
		  
?>
    <script>
			function Confirm()
			{
			  var x = confirm("Are you sure you want to delete?");
			  if (x)
				  return true;
			  else
				 return false;
			}
	</script>
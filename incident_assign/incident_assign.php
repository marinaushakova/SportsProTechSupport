<?php
	require_once('../util/secure_conn.php');  // require a secure connection
	require_once('../util/valid_admin.php');  // require a valid admin user
	include '../view/header.php';
?>
<div id="main">
    <div id="content">
        <h2>Assign Incident</h2>
        <form action="." method="post" id="aligned">
  			<input type="hidden" name="action" value="assign_incident" />
  			<input type="hidden" name="customerID" 
  				   value="<?php echo $incident['incidentID']; ?>" />
  			
  			<label>Customer:</label>
  			<label><?php echo $incident['firstName']." ".$incident['lastName']; ?></label>
  			<br />
  		  
  			<label>Product:</label>
  		 	<label><?php echo $incident['productCode']; ?></label>
      		<br />  	
      		
      		<label>Technician:</label>
  		 	<label><?php echo $technician['firstName']." ".$technician['lastName']; ?></label>
      		<br /> 
      
      		<label></label>
   		 	<input type="submit" value="Assign Incident" />
   		 	<br />   
		</form>
    </div>
</div>
<?php include '../view/footer.php'; ?>
    
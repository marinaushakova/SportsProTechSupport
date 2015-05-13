<?php 
	require_once('../util/secure_conn.php');  // require a secure connection
	require_once('../util/valid_tech.php');  // require a valid admin user
	include '../view/header.php'; 
?>
<div id="main">
	<div id="content">
		<h2>Update Incident</h2>  
		<form action="." method="post" id="aligned">
  			<input type="hidden" name="action" value="update_incident" />
  			<input type="hidden" name="incidentID" 
  				   value="<?php echo $incident['incidentID']; ?>" />
  			<input type="hidden" name="productCode" 
  				   value="<?php echo $incident['productCode']; ?>" />
  			<input type="hidden" name="dateOpened" 
  				   value="<?php echo $incident['dateOpened']; ?>" />
  			<input type="hidden" name="title" 
  				   value="<?php echo $incident['title']; ?>" />
  			<input type="hidden" name="techID" 
  				   value="<?php echo $incident['techID']; ?>" />   
  		
  			<label>Incident:</label>
  			<?php echo $incident['incidentID']; ?>
  			<br />
  		  	
  		  	<label>Product Code:</label>
  			<?php echo $incident['productCode']; ?>
  			<br />
  			
  			<label>Date Opened:</label>
  			<?php $openDate = new DateTime($incident['dateOpened']);
                  echo $openDate->format('n/j/Y'); ?>
  			<br />
  			
  			<label>Date Closed:</label>
  		 	<input type="text" name="dateClosed" />
  		 	<br />
  		 	
  		 	<label>Title:</label>
  			<?php echo $incident['title']; ?>
  			<br />
  			
  			<label>Description:</label>
  			<textarea name="description" cols="50" rows="6"><?php echo $incident['description']; ?></textarea>
  			<br />

   		 	<input type="submit" value="Update Incident" />
   		 	<br />   
		</form>
		<?php include '../view/tech_login_status.php'?>
	</div>
</div>
<?php include '../view/footer.php'; ?>
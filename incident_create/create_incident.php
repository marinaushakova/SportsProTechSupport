<?php 
	require_once('../util/secure_conn.php');  // require a secure connection
	require_once('../util/valid_admin.php');  // require a valid admin user
	include '../view/header.php';
?>
<div id="main">
	<div id="content">
		<h2>Create Incident</h2>  
		<form action="." method="post" id="aligned">
  			<input type="hidden" name="action" value="create_incident" />
  			<input type="hidden" name="customerID" 
  				   value="<?php echo $customer['customerID']; ?>" />
  			
  			<label>Customer:</label>
  			<span><?php echo $customer['firstName']." ".$customer['lastName']; ?></span>
  			<br />
  		  
  			<label>Product:</label>
  		 	<select name="productCode">
                <?php foreach ($products as $product) : ?>
                    <option value="<?php echo $product['productCode']; ?>">
                        <?php echo $product['name']; ?>
                    </option>
                <?php endforeach; ?>
        	</select>
      		<br /> 
      		
      		<label>Title:</label> 	
      		<input type="text" name="title" />
       		<br />
       		
       		<label>Description:</label>
       		<textarea name="description" cols="40" rows="10"></textarea>
       		<br />
      
      		<label></label>
   		 	<input type="submit" value="Cteate Incident" />
   		 	<br />   
		</form>
	</div>
</div>
<?php include '../view/footer.php'; ?>

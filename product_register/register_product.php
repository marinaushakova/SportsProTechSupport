<?php 
	require_once('../util/secure_conn.php');  // require a secure connection
	require_once('../util/valid_customer.php');  // require a valid admin user
	include '../view/header.php'; 
?>
<div id="main">
	<div id="content">
		<h2>Register Product</h2>  
		<form action="." method="post" id="aligned">
  			<input type="hidden" name="action" value="register_product" />
  			<input type="hidden" name="customerID" 
  				   value="<?php echo $customer['customerID']; ?>" />
  			
  			<label>Customer:</label>
  			<label><?php echo $customer['firstName']." ".$customer['lastName']; ?></label>
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
      
      		<label></label>
   		 	<input type="submit" value="Register Rpoduct" />
   		 	<br />   
		</form>
		<?php include '../view/customer_login_status.php'?>
	</div>
</div>
<?php include '../view/footer.php'; ?>
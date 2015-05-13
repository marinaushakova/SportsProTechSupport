<?php 
	require_once('../util/secure_conn.php');  // require a secure connection
	require_once('../util/valid_admin.php');  // require a valid admin user
	include '../view/header.php';
?>
<div id="main">
	<div id="content">
		<!-- display a get customer field -->
		<h2>Get Customer</h2>  
		<form action="." method="post">
  		  <input type="hidden" name="action" value="get_customer" />
  		  <p>You must enter the customer's email address to select the customer.</p>
  		  <label>Email:</label>
  		  <input type="text" name="email" />
   		 <input type="submit" value="Get Customer" />
   		 <br />   
		</form>
	</div>
</div>
<?php include '../view/footer.php'; ?>
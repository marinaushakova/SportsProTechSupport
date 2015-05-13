<?php
	require_once('../util/secure_conn.php');  // require a secure connection
	require_once('../util/valid_admin.php');  // require a valid admin user
	include '../view/header.php';
?>
<div id="main">
	<div id="content">
		<!-- display a search field -->
		<h2>Customer Search</h2>  
		<form action="." method="post">
  		  <input type="hidden" name="action" value="search_customer" />
  		  <label>Last Name:</label>
  		  <input type="text" name="last_name" />
   		 <input type="submit" value="Search" />
   		 <br />   
		</form>
	</div>
</div>
<?php include '../view/footer.php'; ?>
